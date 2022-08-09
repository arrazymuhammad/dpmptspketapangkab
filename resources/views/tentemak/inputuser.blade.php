@extends('tentemak.layout')

@section('content')
<!-- breadcrumbs -->
                <ul class="breadcrumbs">
                    <li><a href="#"><span class="entypo-home"></span></a>
                    </li>
                    <li>Input User
                    </li>
                </ul>
                <!-- end of breadcrumbs -->
                <div class="row no-pad">
                    <div class="large-12 columns">
                        <div class="box bg-white">
                            <!-- /.box-header -->
                            <div class="box-body pad-forty" style="display: block;">
                                <h4>Input User</h4>
                                <hr>
                                <form data-abide action="{{action('TentemakController@postuser')}}" method="POST">
                                {!!csrf_field()!!}
                                    <div class="name-field">
                                        <label>Nama User
                                            <input type="text" required name="name">
                                        </label>
                                        <small class="error">Isikan Nama User.</small>
                                    </div>
                                    <div class="name-field">
                                        <label>E-mail User
                                            <input type="email" required name="email">
                                        </label>
                                        <small class="error">Isikan Email User.</small>
                                    </div>
                                    <div class="name-field">
                                        <label>Password User
                                            <input type="password" required name="password">
                                        </label>
                                        <small class="error">Isikan Password User.</small>
                                    </div>
                                    <input type="submit" class="tiny button bg-aqua" value="Submit">
                                </form>    
                                <br>
                                <hr>
                                <h4>Daftar User</h4>
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">
                                                No
                                            </th>
                                            <th>
                                                Nama
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Email
                                            </th>
                                            <th data-hide="phone">
                                                Edit
                                            </th>
                                            <th data-hide="phone">
                                               View 
                                            </th>
                                            <th data-hide="phone">
                                               Delete 
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($user as $var)
                                        <tr>
                                            <td><?php echo $i; $i=$i+1;?></td>
                                            <td>{{($var->name)}}</td>
                                            <td>{{($var->email)}}</td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/edituser/'.$var->id.'')}}" class="tiny radius button bg-aqua fontello-edit"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/viewuser/'.$var->id.'')}}" class="tiny radius button bg-green fontello-eye"></a></td>
                                            <td style="width: 15px;"><a href="{{url('/tentemak/deleteuser/'.$var->id.'')}}" class="tiny radius button bg-red fontello-trash"></a></td>
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