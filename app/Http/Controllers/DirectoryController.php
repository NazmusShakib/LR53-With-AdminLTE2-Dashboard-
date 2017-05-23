<?php

namespace App\Http\Controllers;
use App\Directory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Intervention\Image\Facades\Image;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $builder = Directory::query();
        if ($request->has('search')) {
            $queryString = $request->search;
            $builder->where('name', 'LIKE', "%$queryString%");
            $builder->orWhere('batch_and_dept', 'LIKE', "%$queryString%");
            $builder->orWhere('email', 'LIKE', "%$queryString%");
            $builder->orWhere('mobile', 'LIKE', "%$queryString%");
            $builder->orWhere('blood_group', 'LIKE', "%$queryString%");
        }
        $directories = $builder->orderBy('id', 'DESC')->paginate(15);

        return view("directories.directory-list", compact('directories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $directory = Directory::findOrFail($id);
        return view('directories.directory-view', compact('directory'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:64|string',
            'batch_and_dept' => 'required|max:64|string',
            'job_designation' => 'max:64|string',
            'campus' => 'max:64|string',
            'company_address' => 'string',
            'company_name' => 'max:64|string',
            'remarks' => 'string',
            'present_address' => 'string',
            'fb_id' => 'string',
            'directory_query' => 'string',
            'email' => 'required|email|Between:3,64',
            'mobile' => 'required|numeric|digits_between:2,15',
            'alt_mob_of_relative' => 'numeric|digits_between:2,15',
            'avatar' => 'mimes:png,jpg,jpeg|max:2096',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if (!empty($request->file('avatar'))) {
            if (!file_exists(public_path() . '/images/directory')) {
                mkdir(public_path() . '/images/directory/thumb', 0777, true);
            }
            $imageID = Uuid::uuid4()->toString();
            $directoryImage = $imageID . '.' . $request->file('avatar')->getClientOriginalExtension();
            $thumb_200x200 = 'thumb_200x200_' . $directoryImage;
            $thumb_100x50 = 'thumb_100x50_' . $directoryImage;

            $request->file('avatar')->move(
                public_path() . '/images/directory/', $directoryImage
            );
            $path = public_path() . '/images/directory/' . $directoryImage;

            Image::make($path)->resize(200, 200)->save(public_path() . '/images/directory/thumb/' . $thumb_200x200);
            Image::make($path)->resize(100, 50)->save(public_path() . '/images/directory/thumb/' . $thumb_100x50);
        } else {
            $directoryImage = null;
        }

        $directory = [
            'name' => $request->name,
            'batch_and_dept' => $request->batch_and_dept,
            'campus' => $request->campus,
            'present_address' => $request->present_address,
            'job_designation' => $request->job_designation,
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'fb_id' => $request->fb_id,
            'blood_group' => $request->blood_group,
            'alt_mob_of_relative' => $request->alt_mob_of_relative,
            'remarks' => $request->remarks,
            'directory_query' => $request->directory_query,
            'avatar' => $directoryImage
        ];
        if (Directory::create($directory)) {
            return back()->with('message_success', 'Directory Submitted Successfully.');
        }
        return back()->with('message_error', 'Failed to add Directory.');
    }


    public function destroy($id)
    {
        $directory = Directory::findOrFail($id);
        if (file_exists(public_path() . '/images/directory/' . $directory->avatar) && $directory->avatar != null) {
            @unlink(public_path() . '/images/directory/thumb/thumb_200x200_' . $directory->avatar);
            @unlink(public_path() . '/images/directory/thumb/thumb_100x50_' . $directory->avatar);
            @unlink(public_path() . '/images/directory/' . $directory->avatar);
        }
        $directory->delete();

        return back()->with('message_success', 'Directory deleted successfully.');
    }
}
