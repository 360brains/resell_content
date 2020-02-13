@extends('user.layouts.master')
@section('content')
    <section class="help-support">
        <div class="help-banner">
            <div class="container">
                <h2>How we may help you?</h2>
                <div class="input-group help-form">
                    <input type="text" class="form-control" placeholder="I have a question about">
                    <div class="input-group-append">
                        <button class="btn" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <p>Learn Everything you need to Know about projects, settings up payment and releasing your payments.</p>
            </div>
        </div>
        <div class="help-content pt-3 pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills" role="tablist">
                            <li><a class="nav-link active" data-toggle="pill" href="#general">General</a></li>
                            <li><a class="nav-link" data-toggle="pill" href="#project">Project</a></li>
                            <li><a class="nav-link" data-toggle="pill" href="#payment">Payment</a></li>
                            <li><a class="nav-link" data-toggle="pill" href="#membership">Membership</a></li>
                            <li><a class="nav-link" data-toggle="pill" href="#contact">Contact Us</a></li>
                        </ul>
                        <div class="content">
                            <div class="tab-content">
                                <div id="general" class="general tab-pane active">
                                    <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">
                                                    <a class="card-title"> What is the greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                                </div>
                                                <div id="collapseOne" class="card-body collapse" data-parent="#accordion">
                                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                                </div>
                                                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    <a class="card-title"> Getting start on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                                </div>
                                                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                                                    <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                                </div>
                                                <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    <a class="card-title"> Getting work done on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div id="project" class="project tab-pane fade">
                                    <div id="accordion" class="accordion">
                                        <div class="card mb-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne1">
                                                <a class="card-title"> What is the greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseOne1" class="card-body collapse" data-parent="#accordion">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo2">
                                                <a class="card-title"> Getting start on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseTwo2" class="card-body collapse" data-parent="#accordion">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree3">
                                                <a class="card-title"> Getting work done on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseThree3" class="collapse" data-parent="#accordion">
                                                <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="payment" class="payment tab-pane fade">
                                    <div id="accordion" class="accordion">
                                        <div class="card mb-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne11">
                                                <a class="card-title"> What is the greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseOne11" class="card-body collapse" data-parent="#accordion">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo22">
                                                <a class="card-title"> Getting start on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseTwo22" class="card-body collapse" data-parent="#accordion">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree33">
                                                <a class="card-title"> Getting work done on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseThree33" class="collapse" data-parent="#accordion">
                                                <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="membership" class="membership tab-pane fade">
                                    <div id="accordion" class="accordion">
                                        <div class="card mb-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne111">
                                                <a class="card-title"> What is the greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseOne111" class="card-body collapse" data-parent="#accordion">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo222">
                                                <a class="card-title"> Getting start on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseTwo222" class="card-body collapse" data-parent="#accordion">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree333">
                                                <a class="card-title"> Getting work done on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseThree333" class="collapse" data-parent="#accordion">
                                                <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="contact" class="contact tab-pane fade">
                                    <div id="accordion" class="accordion">
                                        <div class="card mb-0">
                                            <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne1111">
                                                <a class="card-title"> What is the greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseOne1111" class="card-body collapse" data-parent="#accordion">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo2222">
                                                <a class="card-title"> Getting start on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseTwo2222" class="card-body collapse" data-parent="#accordion">
                                                <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                            </div>
                                            <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree3333">
                                                <a class="card-title"> Getting work done on greatContent <i class="fa float-right" aria-hidden="true"></i></a>
                                            </div>
                                            <div id="collapseThree3333" class="collapse" data-parent="#accordion">
                                                <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. samus labore sustainable VHS. </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
