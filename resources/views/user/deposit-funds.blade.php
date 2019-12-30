@extends('user.layouts.master')

@section('content')
    <section class="funds pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="funds-heading text-center">
                        <div class="row">
                            <div class="col-md-6 border-right border-sm-0">
                                <h5><a class="hvrcenter" href="{{ route('withdraw.create') }}">Withdraw</a></h5>
                            </div>
                            <div class="col-md-6">
                                <h5><a class="hvrcenter active" href="#" data-toggle="modal"
                                       data-target="#deposit2">Deposit</a></h5>
                            </div>
                        </div>
                    </div>
                    @if($method == 'bank')
                        <div class="funds-card mt-3 mb-3">
                            <div class="card-head">
                                <h2 class="text-center pb-3">Bank Deposit</h2>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4 >Bank Information</h4>
                                    <div>
                                        <table class="table">
                                            <tr>
                                                <td>Account Name</td>
                                                <td>Sunztech</td>
                                            </tr>
                                            <tr>
                                                <td>Account Number</td>
                                                <td>11223344</td>
                                            </tr>
                                            <tr>
                                                <td>Bank Name</td>
                                                <td>MCB Bank Limited</td>
                                            </tr>
                                            <tr>
                                                <td>Branch Adress</td>
                                                <td>Susan Road, Faisalabad.</td>
                                            </tr>
                                            <tr>
                                                <td>ABA/Routing Number</td>
                                                <td>112233</td>
                                            </tr>
                                            <tr>
                                                <td>Swift Code</td>
                                                <td>112233</td>
                                            </tr>
                                        </table>
                                        <h4>Reference</h4>
                                        <p>Wire Deposit to Freelancer. Username: esolzpk (id: 6902811)
                                            Once you have deposited your funds, click the button to proceed.
                                            Enter your deposit details so we can identify your payment and
                                            finish the deposit faster. Please take a receipt or reference number
                                            from your bank after depositing.</p><br>
                                    </div>
                                    <br>
                                    <form action="{{ route('user.store.funds' ) }}" method="post">
                                        @csrf
                                        <div class="input-item input-with-label">
                                            <label for="amount" class="input-item-label">Bank account name you
                                                are deposit from:</label>
                                            <input class="input-bordered" type="text" id="bank" name="bank"
                                                   value="{{old('bank')}}"
                                                   placeholder="Enter bank account name:">
                                        </div>

                                        <div class="input-item input-with-label">Deposit reference <small>(transaction
                                                id or reference number):</small></label>
                                            <input class="input-bordered" type="text" name="reference_id"
                                                   value="{{old('reference_id')}}"
                                                   placeholder="Enter transaction id">
                                        </div>

                                        <div class="input-item input-with-label">Amount:</label>
                                            <input class="input-bordered" type="number" name="amount"
                                                   value="{{old('amount')}}"
                                                   placeholder="Enter amount Deposited">
                                        </div>

                                        <div class="input-item input-with-label">
                                            <label for="balance" class="input-item-label">Date of
                                                deposit:</label>
                                            <input class="input-bordered" type="date" name="date"
                                                   value="{{old('date')}}" placeholder="">
                                        </div>

                                        <div>
                                            <p>Note: Any transaction fees charged by your bank will be deducted
                                                from the total transfer amount. Funds will be credited to your
                                                balance on the next business day after the funds are received by
                                                Freelancer's bank. If you have any questions please contact
                                                Online Support</p>
                                        </div>

                                        <div class="input-item input-with-label">
                                            <button class="btn btn-block btn-success" name="action"
                                                    value="bank" type="submit">Confirm and pay
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    @elseif($method == 'jazzcash')
                        <div class="funds-card mt-3 mb-3">
                            <div class="card-head">
                                <h2 class="text-center pb-3">JazzCash Deposit</h2>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>JazzCash Information</h4>
                                    <div>
                                        <table class="table">
                                            <tr>
                                                <td>A/C Name:</td>
                                                <td>Freelancer</td>
                                            </tr>
                                            <tr>
                                                <td>A/C #:</td>
                                                <td>11223344</td>
                                            </tr>
                                            <tr>
                                                <td>Bank Name:</td>
                                                <td>Allied</td>
                                            </tr>
                                            <tr>
                                                <td>Branch Adress:</td>
                                                <td>Alnoor garden</td>
                                            </tr>
                                            <tr>
                                                <td>Swift Code:</td>
                                                <td>112233</td>
                                            </tr>
                                        </table>
                                        <h4>Reference</h4>
                                        <p>Wire Deposit to Freelancer. Username: esolzpk (id: 6902811)
                                            Once you have deposited your funds, click the button to proceed.
                                            Enter your deposit details so we can identify your payment and
                                            finish the deposit faster. Please take a receipt or reference number
                                            from your bank after depositing.</p><br>
                                    </div>
                                    <form action="{{ route('user.store.funds' ) }}" method="post">
                                        @csrf

                                        <div class="input-item input-with-label">Deposit reference <small>(transaction
                                                id or reference number):</small></label>
                                            <input class="input-bordered" type="text" name="reference_id"
                                                   value="{{old('reference_id')}}"
                                                   placeholder="Enter transaction id">
                                        </div>

                                        <div class="input-item input-with-label">Amount:</label>
                                            <input class="input-bordered" type="number" name="amount"
                                                   value="{{old('amount')}}"
                                                   placeholder="Enter amount Deposited">
                                        </div>

                                        <div class="input-item input-with-label">
                                            <label for="balance" class="input-item-label">Date of
                                                deposit:</label>
                                            <input class="input-bordered" type="date" name="date"
                                                   value="{{old('date')}}" placeholder="">
                                        </div>

                                        <div>
                                            <p>Note: Any transaction fees charged by your bank will be deducted
                                                from the total transfer amount. Funds will be credited to your
                                                balance on the next business day after the funds are received by
                                                Freelancer's bank. If you have any questions please contact
                                                Online Support</p>
                                        </div>

                                        <div class="input-item input-with-label">
                                            <button class="btn btn-block btn-success" name="action"
                                                    value="jazzcash" type="submit">Confirm and pay
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    @elseif($method == 'easypaisa')
                        <div class="funds-card mt-3 mb-3">
                            <div class="card-head">
                                <h2 class="text-center pb-3">EasyPaisa Deposit</h2>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>EasyPaisa Information</h4>
                                    <div>
                                        <table class="table">
                                            <tr>
                                                <td>A/C Name:</td>
                                                <td>Freelancer</td>
                                            </tr>
                                            <tr>
                                                <td>A/C #:</td>
                                                <td>11223344</td>
                                            </tr>
                                            <tr>
                                                <td>Bank Name:</td>
                                                <td>Allied</td>
                                            </tr>
                                            <tr>
                                                <td>Branch Adress:</td>
                                                <td>Alnoor garden</td>
                                            </tr>
                                            <tr>
                                                <td>ABA/Routing Number:</td>
                                                <td>112233</td>
                                            </tr>
                                            <tr>
                                                <td>Swift Code:</td>
                                                <td>112233</td>
                                            </tr>
                                        </table>
                                        <h4>Reference</h4>
                                        <p>Wire Deposit to Freelancer. Username: esolzpk (id: 6902811)
                                            Once you have deposited your funds, click the button to proceed.
                                            Enter your deposit details so we can identify your payment and
                                            finish the deposit faster. Please take a receipt or reference number
                                            from your bank after depositing.</p>
                                    </div>
                                    <form action="{{ route('user.store.funds' ) }}" method="post">
                                        @csrf
                                        <div class="input-item input-with-label">
                                            <label for="amount" class="input-item-label">Bank account name you
                                                are deposit from:</label>
                                            <input class="input-bordered" type="text" id="bank" name="bank"
                                                   value="{{old('bank')}}"
                                                   placeholder="Enter bank account name:">
                                        </div>

                                        <div class="input-item input-with-label">
                                            <label for="balance" class="input-item-label">Date of
                                                deposit:</label>
                                            <input class="input-bordered" type="date" name="date"
                                                   value="{{old('date')}}" placeholder="">
                                        </div>

                                        <div class="input-item input-with-label">Deposit reference <small>(transaction
                                                id or reference number):</small></label>
                                            <input class="input-bordered" type="text" name="reference_id"
                                                   value="{{old('reference_id')}}"
                                                   placeholder="Enter transaction id">
                                        </div>
                                        <div class="input-item input-with-label">Amount:</label>
                                            <input class="input-bordered" type="number" name="amount"
                                                   value="{{old('amount')}}"
                                                   placeholder="Enter amount Deposited">
                                        </div>
                                        <div>
                                            <p>Note: Any transaction fees charged by your bank will be deducted
                                                from the total transfer amount. Funds will be credited to your
                                                balance on the next business day after the funds are received by
                                                Freelancer's bank. If you have any questions please contact
                                                Online Support</p><br>
                                        </div>

                                        <div class="input-item input-with-label">
                                            <button class="btn btn-block btn-success" name="action"
                                                    value="easypaisa" type="submit">Confirm and pay
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
