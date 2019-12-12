<?php

namespace App\Http\Controllers\User;

use App\Models\Training;
use App\Models\Transaction;
use App\Notifications\TaskResult;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    public function buy(Request $request, $id){
        $training = Training::find($id);
        if ($request->check == 'on'){

            if (auth()->user()->balance >= $training->fee){

                auth()->user()->trainings()->attach($training->id, ['status' => 'started']);
//                auth()->user()->trainings()->attach($training->id, ['status' => 'started', 'started_at' => now()]);

                $newBalance = [
                    'balance'           => auth()->user()->balance - $training->fee,
                ];

                $responce = auth()->user()->update($newBalance);

                $data = [
                    'type'            =>'Credit',
                    'amount'          => $training->fee,
                    'description'     =>'Purchased training',
                    'training_id'     => $training->id,
                    'status'          => "Paid",
                    'user_id'         => auth()->user()->id,
                ];

                $response = Transaction::create($data);

                $details = [
                    'taskName'      => $training->name,
                    'date'          => now(),
                    'message'       => 'Congratulations! Your training has started.',
                    'tooltip'       => 'You will have to take all the lectures to get the badge of this training.',
                    'link'          => "<a href=".route("user.learn.details", $training->id)." class=\'d-inline\'>Details</a>",
                ];

                auth()->user()->notify(new TaskResult($details));

                $adminDetails = [
                    'taskName'      => $training->name,
                    'date'          => now(),
                    'message'       => "<a href=".route("admin.users.show", auth()->user()->id)." class='d-inline'>". auth()->user()->name . "</a><a href='#' class='d-inline'> Bought a Training.</a>",
                    'tooltip'       => 'Training',
                    'link'          => "",

                ];

                $admins = Admin::all();
                foreach ($admins as $admin) {
                    $admin->notify(new TaskResult($adminDetails));
                }

                if ($responce){
                    return redirect()->route('user.learn.details', $training->id)->with("success", "Completed Successfully.");
                }else{
                    return redirect()->back()->with("error", "Something went wrong. Please try again.");
                }
            }else{
                return redirect()->back()->with("error", "Your balance is not enough to Buy this Training. Try after depositing Funds.");
            }
        }else{
            return redirect()->back()->with("error", "Please agree to the Training purchase agreement.");
        }
    }
}
