<x-dashboard-layout >


    <form action="{{ route('admin.datedays.update', $dateday->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            @include('admin.datedays._form',[
            'button_lable' => 'تعديل'
            ])
    </form>
    </x-dashboard-layout>