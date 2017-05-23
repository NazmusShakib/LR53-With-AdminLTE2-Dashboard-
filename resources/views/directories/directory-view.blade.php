<div class="row">
    <div class="col-md-3 col-lg-3 " align="center">
        @if($directory->avatar != null)
            <img src="/images/directory/thumb/thumb_200x200_{{ $directory->avatar }}"
                 class="profile-user-img img-responsive img-circle" alt="Avatar">
        @else
            <img src="https://placeholdit.imgix.net/~text?txtsize=120&txt={{substr(ucwords
                ($directory->name), 0, 1)}}&w=196&h=196" alt="Avatar" class="profile-user-img
                            img-responsive img-circle"/>
        @endif
    </div>

    <div class=" col-md-9 col-lg-9 ">
        <table class="table table-user-information">
            <tbody>
            <tr>
                <td>Name:</td>
                <td>{{$directory->name or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Batch & Dept:</td>
                <td>{{$directory->batch_and_dept or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Campus:</td>
                <td>{{$directory->campus or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Present Address:</td>
                <td>{{$directory->present_address or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Job Designation:</td>
                <td>{{$directory->job_designation or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Company Name:</td>
                <td>{{$directory->company_name or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Company Address:</td>
                <td>{{$directory->company_address or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Mobile:</td>
                <td>{{$directory->mobile or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><a href="mailto:{{$directory->email}}">{{$directory->email or 'N/A'}}</a></td>
            </tr>
            <tr>
                <td>Alternative Mobile no. of Relative:</td>
                <td>{{$directory->alt_mob_of_relative or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Facebook ID:</td>
                <td>{{$directory->fb_id or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Blood Group:</td>
                <td>{{$directory->blood_group or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Remarks:</td>
                <td>{{$directory->remarks or 'N/A'}}</td>
            </tr>
            <tr>
                <td>Query:</td>
                <td>{{$directory->directory_query or 'N/A'}}</td>
            </tr>

            </tbody>
        </table>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>