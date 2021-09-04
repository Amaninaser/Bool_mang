<x-dashboard-layout title="Edit Trainee">


    <form action="{{ route('admin.trainees.update', $trainee->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('admin.trainees._form',[
            'button_lable' => 'تعديل'
            ])
    </form>
    </x-dashboard-layout>