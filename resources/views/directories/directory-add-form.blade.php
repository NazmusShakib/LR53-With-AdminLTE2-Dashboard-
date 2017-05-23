@extends('layouts.master-public')
@section('main-content')
    <style>

        body {
            padding-top: 20px;
            padding-bottom: 20px;
            background: url(assets/images/form-background.jpg)no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        /* Everything but the jumbotron gets side spacing for mobile first views */
        .header,
        .marketing,
        .footer {
            padding-right: 15px;
            padding-left: 15px;
        }

        /* Custom page header */
        .header {
            border-bottom: 1px solid #e5e5e5;
        }
        /* Make the masthead heading the same height as the navigation */
        .header h3 {
            padding-bottom: 19px;
            margin-top: 0;
            margin-bottom: 0;
            line-height: 40px;
        }

        /* Custom page footer */
        .footer {
            padding-top: 19px;
            color: #777;
            border-top: 1px solid #e5e5e5;
        }

        /* Customize container */
        @media (min-width: 768px) {
            .container {
                max-width: 730px;
            }
        }
        .container-narrow > hr {
            margin: 30px 0;
        }

        /* Main marketing message and sign up button */
        .jumbotron {
            text-align: center;
            border-bottom: 1px solid #e5e5e5;
        }
        .jumbotron .btn {
            padding: 14px 24px;
            font-size: 21px;
        }

        /* Supporting marketing content */
        .marketing {
            margin: 40px 0;
        }
        .marketing p + h4 {
            margin-top: 28px;
        }

        /* Responsive: Portrait tablets and up */
        @media screen and (min-width: 768px) {
            /* Remove the padding we set earlier */
            .header,
            .marketing,
            .footer {
                padding-right: 0;
                padding-left: 0;
            }
            /* Space out the masthead */
            .header {
                margin-bottom: 30px;
            }
            /* Remove the bottom border on the jumbotron for visual effect */
            .jumbotron {
                border-bottom: 0;
            }
        }
    </style>

    <div class="container">
        <h1 class="well">Directory for IIUC-ian</h1>
        <div class="col-lg-12 well">
            @include('layouts.alert-msg')
            <div class="row">
                <form action="{{route('directory.store')}}" method="POST" enctype="multipart/form-data" role="form">
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}"
                                   placeholder="Enter Name Here.." class="form-control" required>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group {{ $errors->has('batch_and_dept') ? ' has-error' : '' }}">
                                <label for="batch_and_dept">Batch & Dept:</label>
                                <input type="text" name="batch_and_dept" value="{{old('batch_and_dept')}}" id="batch_and_dept"
                                       placeholder="Enter Batch & Department Here.." class="form-control" required>
                                @if ($errors->has('batch_and_dept'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('batch_and_dept') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 form-group {{ $errors->has('campus') ? ' has-error' : '' }}">
                                <label for="campus">Campus:</label>
                                <input type="text" name="campus" value="{{old('campus')}}" id="campus" placeholder="Enter Campus Name Here.."
                                       class="form-control">
                                @if ($errors->has('campus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('campus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="present_address">Present Address:</label>
                            <textarea name="present_address" id="present_address"
                                      placeholder="Enter Present Address Here.." rows="3"
                                      class="form-control">{!! old('present_address') !!}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group {{ $errors->has('job_designation') ? ' has-error' : '' }}">
                                <label for="job_designation">Job Designation:</label>
                                <input type="text" name="job_designation" value="{{old('job_designation')}}" id="job_designation"
                                       placeholder="Enter Job Designation Here.." class="form-control">
                                @if ($errors->has('job_designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('job_designation') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-sm-6 form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                                <label for="company_name">Company Name:</label>
                                <input type="text" name="company_name" id="company_name" value="{{old('company_name')}}"
                                       placeholder="Enter Company Name Here.." class="form-control">
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="company_address">Company Address:</label>
                            <textarea name="company_address" id="company_address"
                                      placeholder="Enter Company Address Here.." rows="3"
                                      class="form-control">{!! old('company_address') !!}</textarea>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Your Email:</label>
                            <input type="text" name="email" id="email" value="{{old('email')}}"
                                   placeholder="Enter Email Here.." class="form-control" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile">Your Mobile No.:</label>
                            <input type="text" name="mobile" id="mobile" value="{{old('mobile')}}"
                                   placeholder="Enter Mobile No. Here.." class="form-control" required>
                            @if ($errors->has('mobile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mobile') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group {{ $errors->has('alt_mob_of_relative') ? ' has-error' : '' }}">
                            <label for="alt_mob_of_relative">Alternative Mobile no. of Relative:</label>
                            <input type="text" name="alt_mob_of_relative" id="alt_mob_of_relative"
                                   value="{{old('alt_mob_of_relative')}}"
                                   placeholder="Enter Alternative Mobile no. of Relative Here.." class="form-control">
                            @if ($errors->has('alt_mob_of_relative'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('alt_mob_of_relative') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="fb_id">Facebook ID:</label>
                                <input type="text" name="fb_id" id="fb_id" value="{{old('fb_id')}}" placeholder="Enter Facebook ID.."
                                       class="form-control">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="blood_group">Blood Group:</label>
                                <select class="form-control" name="blood_group" id="blood_group">
                                    <option value="">Select Your Blood Group</option>
                                    <option value="O−" {{ old('blood_group') == 'O−' ? 'selected="selected"' : '' }}>O−</option>
                                    <option value="O+" {{ old('blood_group') == 'O+' ? 'selected="selected"' : '' }}>O+</option>
                                    <option value="A−" {{ old('blood_group') == 'A−' ? 'selected="selected"' : '' }}>A−</option>
                                    <option value="A+" {{ old('blood_group') == 'A+' ? 'selected="selected"' : '' }}>A+</option>
                                    <option value="B−" {{ old('blood_group') == 'B−' ? 'selected="selected"' : '' }}>B−</option>
                                    <option value="B+" {{ old('blood_group') == 'B+' ? 'selected="selected"' : '' }}>B+</option>
                                    <option value="AB−" {{ old('blood_group') == 'AB−' ? 'selected="selected"' : '' }}>AB−</option>
                                    <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected="selected"' : '' }}>AB+</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="remarks">Remarks:</label>
                            <textarea name="remarks" id="remarks" placeholder="Enter Remarks Here.." rows="3"
                                      class="form-control"> {!! old('remarks') !!} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="directory_query">Query:</label>
                            <textarea name="directory_query" id="directory_query" placeholder="Enter Query Here.." rows="3"
                                      class="form-control">{!! old('directory_query') !!}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="avatar">Upload Your Photo:</label>
                            <input type="file" name="avatar" id="avatar" placeholder="Upload Your Photo Here.."
                                   class="form-control">
                        </div>

                        <button type="submit" class="btn btn-lg btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- /.content -->
@endsection