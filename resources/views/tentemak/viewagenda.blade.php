@extends('tentemak.layout')

@section('content')
<!-- breadcrumbs -->
                <ul class="breadcrumbs">
                    <li><a href="#"><span class="entypo-home"></span></a>
                    </li>
                    <li>Input Agenda
                    </li>
                </ul>
                <!-- end of breadcrumbs -->
                <div class="row no-pad">
                    <div class="large-12 columns">
                        <div class="box bg-white">
                            <!-- /.box-header -->
                            <div class="box-body pad-forty" style="display: block;">
                                <h4>Details Agenda</h4>
                                <hr>
                                <div class="name-field">
                                    <label>Isi Agenda
                                        <textarea name="agenda" rows="10">{{$view->agenda}}</textarea>
                                    </label>
                                </div>
                                <div class="name-field">
                                    <label>Tanggal Agenda
                                        <input type="text" required name="tanggal" value="{{$view->tanggal}}">
                                    </label>
                                </div>
                                <br>
                                <hr>
                                <h4>Daftar Agenda</h4>
                                <div class="row" style="margin-bottom:10px;">
                                    <div class="large-4 columns">
                                        <input class="form-control" id="filter" placeholder="Cari Agenda..." type="text" />
                                    </div>
                                </div>
                                <table id="footable-res2" class="demo" data-filter="#filter" data-filter-text-only="true" style="width: 100%;" role="grid">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">
                                                No
                                            </th>
                                            <th>
                                                Agenda
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Tanggal
                                            </th>
                                            <th data-hide="phone">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($agenda as $var)
                                        <tr>
                                            <td><?php echo $i; $i=$i+1;?></td>
                                            <td>{{Date::truncate(($var->agenda), 5, 100)}}</td>
                                            <td>{{Date::indonesian_date($var->tanggal,'j F Y')}}</td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/editagenda/'.$var->id.'')}}" class="tiny radius button bg-aqua fontello-edit"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/viewagenda/'.$var->id.'')}}" class="tiny radius button bg-green fontello-eye"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/deleteagenda/'.$var->id.'')}}" class="tiny radius button bg-red fontello-trash"></a></td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                <!-- end of Date picker -->
                            </div>
                            <!-- end .timeline -->
                        </div>
                        <!-- box -->
                    </div>
                </div>
@endsection