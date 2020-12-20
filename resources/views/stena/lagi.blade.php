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
    <div class="col-xl-6">
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
                        <p>Рассчитайте кол-во лаг</p>
                    </div>
                    <form action="{{route('nagel.raschet')}}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="dollar-1">Размеры балки</label>
                            <div class="input-group input-group-multi-transition">
                                <input type="number" step="10" class="form-control" aria-label="Высота балки"  placeholder="Высота">
                                <input type="number"  step="any" class="form-control" aria-label="Толщина балки" placeholder="Толщина">
                                <input type="number" step="any" class="form-control" aria-label="Длина заготоки" placeholder="Длина">
                                <div class="input-group-append">
                                    <span class="input-group-text">мм</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-url">Размеры комнаты</label>
                            <div class="input-group">
                                <input type="number" step="100" aria-label="Длина" class="form-control" placeholder="Длина">
                                <input type="number" step="100" aria-label="Ширина" class="form-control" placeholder="Ширина">
                                <div class="input-group-append">
                                    <span class="input-group-text">мм</span>
                                </div>
                            </div>
                            <span class="help-block">Длина - направление лаги</span>
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
                            <button class="btn btn-primary ml-auto waves-effect waves-themed" type="submit">Расчитать</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="col-xl-6">
        <div id="panel-6" class="panel">
            <div class="panel-hdr">
                <h2>
                    Результат расчета <span class="fw-300"></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Результат и принцип расчета
                    </div>

                    @isset($nagel)
                    <div class="table-responsive-lg">
                        <table class="table table-bordered m-0">
                            <thead>
                            <tr>
                                <th>Наименовани</th>
                                <th>Обозначение на четеже</th>
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
                                <th scope="row">Кол-во нагелей/отвертстий</th>
                                <td>нет</td>
                                <td>{{ $nagel->colvo}} шт.</td>
                            </tr>
                            <tr>
                                <th scope="row">Кол-во заготовок(черенков)</th>
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

                    <img src="/img/total/нагель.jpg" width="100%">
                    <img src="/img/total/нагель_цвет.jpg" width="100%">
            </div>
        </div>

    </div>
</div>

@endsection
