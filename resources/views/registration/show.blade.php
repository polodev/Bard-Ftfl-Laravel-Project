@extends('admin/layouts/master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ $data->id }}<br>
                {{ $data->bengali_name }}<br>
                {{ $data->english_name }}<br>
                {{ $data->father_name }}<br>
                {{ $data->mother_name }}<br>
                {{ $data->date_of_birth }}<br>
                {{ $data->village }}<br>
                {{ $data->post_office }}<br>
                {{ $data->upazila }}<br>
                {{ $data->district }}<br>
                {{ $data->id_code }}<br>
                {{ $data->organization }}<br>
                {{ $data->telephone }}<br>
                {{ $data->fax }}<br>
                {{ $data->e_mail }}<br>
                {{ $data->mobile }}<br>
                {{ $data->joining_date }}<br>
                {{ $data->service_code }}<br>
                {{ $data->service_code }}<br>
                {{ $data->training_id }}<br>
                {{ $data->marital_status }}<br>
                {{ $data->contact_person_name }}<br>
                {{ $data->contact_person_address }}<br>
                {{ $data->contact_person_tel }}<br>
                {{ $data->participant_rel }}<br>
                {{ $data->img_path }}<br>
                {{ $data->edu_id }}<br>
                {{ $data->user_id }}<br>
                {{ $data->created_at }}<br>
                {{ $data->updated_at }}<br>
            </div>
        </div>
    </div>
@endsection
