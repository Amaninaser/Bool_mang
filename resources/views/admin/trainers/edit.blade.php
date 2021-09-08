<x-dashboard-layout title="Edit Trainer">


    <form action="{{ route('admin.trainers.update', $trainer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('admin.trainers._form',[
            'button_lable' => 'تعديل'
            ])
    </form>

    </x-dashboard-layout>