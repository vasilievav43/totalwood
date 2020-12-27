@extends('layouts.main')
@section('content')
{{--    <ol class="breadcrumb page-breadcrumb">--}}
{{--        <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>--}}
{{--        <li class="breadcrumb-item">Application Intel</li>--}}
{{--        <li class="breadcrumb-item active">Privacy</li>--}}
{{--        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>--}}
{{--    </ol>--}}
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='fal fa-info-circle'></i> Нагель
            <small>
               Расчет количества нагелей
            </small>
        </h1>
    </div>
    <div class="row">
    <div class="col-lg-4">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Расчет<span class="fw-300"><i></i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Свернуть"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="На полный экран"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Закрыть"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        <p>Рассчитайте кол-во нагелей</p>
                    </div>
                    <form action="{{route('nagel.raschet')}}#result" method="Post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="basic-url">Длина всего бруса</label>
                            <div class="input-group">
                                <div class="input-group-prepend" >
                                    <button class="btn btn-outline-default waves-effect waves-themed" type="button">L</button>
                                </div>
                                <input name="dlina" type="number"  class="form-control" placeholder="длина" value="{{ $nagel->dlinaSteni ?? '' }}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">м.п.</span>
                                </div>
                            </div>
                            <span class="help-block">Общий погонаж бруса в метрах в стенах</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-url">Высота бруса <code>H</code></label>
                            <div class="input-group">
                                <div class="input-group-prepend" data-toggle="modal" data-target="#default-example-modal-lg-center">
                                    <button class="btn btn-outline-default waves-effect waves-themed" type="button"><i class="fal fa-question fs-md"></i></button>
                                </div>
                                <input name="visota" type="number"  class="form-control" placeholder="высота" value="{{ $nagel->visotaBrevna ?? '145' }}" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">мм</span>
                                </div>
                            </div>
                            <span class="help-block">Высота бруса, оцб, лафета в милиметрах</span>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="basic-url">Длина заготовки</label>
                            <div class="input-group">
                                <div class="input-group-prepend" >
                                    <button class="btn btn-outline-default waves-effect waves-themed" type="button">l</button>
                                </div>
                                <input name="dlina_z" type="number"  class="form-control" placeholder="длина заготовки"  value="{{ $nagel->dlinaZagotovki ?? '2400' }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">мм</span>
                                </div>
                            </div>
                            <span class="help-block">Длина заготовки(черенка) в мм</span>
                        </div>
                        <div class="form-group">

                            <label class="form-label" for="basic-url">Шаг установки <code>S</code></label>
                            <div class="input-group">
                                <div class="input-group-prepend" data-toggle="modal" data-target="#default-example-modal-lg-center">
                                    <button class="btn btn-outline-default waves-effect waves-themed" type="button"><i class="fal fa-question fs-md"></i></button>
                                </div>
                                <input type="number" name="shag"  class="form-control" placeholder="шаг установки"  value="{{ $nagel->shag ?? '1500' }}">
                                <div class="input-group-append">
                                    <span class="input-group-text">мм</span>
                                </div>
                            </div>
                            <span class="help-block">Шаг установки нагелей в милиметрах</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Округлить до метров (сформировать в пачки)</label>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" name="celoe"  class="custom-control-input"  id="customSwitch2"
                                    @isset($nagel->celoe)   @if($nagel->celoe==true) checked @endif @endisset>
                                <label class="custom-control-label" for="customSwitch2">Округлить</label>
                            </div>
                        </div>
                        <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row">


                            <button class="btn  btn-outline-info  ml-auto waves-effect waves-themed" type="button" data-toggle="modal" data-target="#default-example-modal-lg-center2"><span class="fal fa-cube mr-1"></span>
                               3Д схема
                            </button>
                            <button class="btn  btn-outline-success   ml-auto waves-effect waves-themed" type="button" data-toggle="modal" data-target="#default-example-modal-lg-center"><span class="fal fa-exclamation-triangle mr-1"></span>
                                Чертеж
                            </button>

                            <button class="btn btn-primary ml-auto waves-effect waves-themed" type="submit">Расчитать</button>
                        </div>





                    </form>
                </div>
            </div>

        </div>

    </div>
    <div class="col-lg-8">
        <div id="panel-6" class="panel">
            <div class="panel-hdr">
                <h2>
                   Результат расчета<span class="fw-300"></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="panel-tag" id="result">
                                Результат расчета
                            </div>
                            @isset($nagel)
                                <div class="table-responsive-md">
                                    <table class="table table-bordered m-0">
                                        <thead>
                                        <tr>
                                            <th>Наименовани</th>
                                            <th>На четеже</th>
                                            <th>Значение</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Метров нагеля</th>
                                            <td>нет</td>
                                            <td>{{ $nagel->metrovPogon}} м.п</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Кол-во нагелей / отвертстий</th>
                                            <td>нет</td>
                                            <td>{{ $nagel->colvo}} шт.</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Кол-во заготовок (черенков)</th>
                                            <td>нет</td>
                                            <td>{{ $nagel->colvoCherencov}} шт.</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Кол-во нагелей в заготовке</th>
                                            <td>нет</td>
                                            <td>{{ $nagel->colvoVzag}} шт.</td>
                                        </tr>
                                        @if($nagel->celoe==true)
                                            <tr>
                                                <th scope="row">Кол-во пачек</th>
                                                <td>нет</td>
                                                <td>{{ $nagel->pachek}} шт.</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Кол-во заготовок в пачке</th>
                                                <td>нет</td>
                                                <td>{{ $nagel->vPachke}} шт.</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th scope="row">Длина нагеля</th>
                                            <td>D</td>
                                            <td>{{ $nagel->dlina}} мм</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Глубина отверстия</th>
                                            <td>G</td>
                                            <td>{{ $nagel->dlina+20}} мм</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endisset
                        </div>
                    </div>



        </div>
    </div>
        <!-- Modal center Large -->
        <div class="modal fade" id="default-example-modal-lg-center" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Схема установки нагеля</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="/img/total/нагель.jpg" width="100%">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal center Large 3d -->
        <div class="modal fade" id="default-example-modal-lg-center2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"Схема установки</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="/img/total/нагель_цвет.jpg" width="100%">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
@endsection
