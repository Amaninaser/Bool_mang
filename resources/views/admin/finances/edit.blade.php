<x-dashboard-layout title="Edit Finance">


    <form action="{{ route('admin.finances.update', $finance->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('admin.finances._form',[
            'button_lable' => 'تعديل'
            ])
    </form>
    </x-dashboard-layout>