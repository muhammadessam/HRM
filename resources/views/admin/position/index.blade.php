@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
<style>
    table{
        margin: auto 5%;
        font-family: cairo;
        font-weight: 600 !important;
        letter-spacing: 1.5px;
        width: 90% !important;
    }
    .edit-or-view{
        color: white !important;
        font-weight: bold;
        font-size: 14px;
        border: 0 !important;
        border-radius: 50px !important;
    }
    .edit-or-view:hover{
        color = #9c27b0;
        background-color:green;
        border:2px solid #9c27b0 !important;
    }
    .delete-s{
        color: white !important;
        font-weight: bold;
        font-size: 14px;
        border: 0 !important;
        border-radius: 50px !important; 
    }
    th center{
        font-size:15px;
    }
    
</style>
</script>
        <div class="fresh-table toolbar-color-blue">
          <div class="toolbar">
          </div>

          <table id="fresh-table" class="table"  style="border:solid 1px #000;">
            <thead >
              <tr class="btn-info" style="width:100%;">
                <th data-field="id" style="border:solid 1px #000;"><center>#</center></th>
                <th data-field="name" data-sortable="true" style="border:solid 1px #000;">
                  <center>
              اسم مكان العمل
                  </center>
                </th>

                <th data-field="salary" data-sortable="true" style="border:solid 1px #000;">
                  <center>
            الطول
                  </center>
                </th>
                <th data-field="salary" data-sortable="true" style="border:solid 1px #000;">
                  <center>
          العرض
                  </center>
                </th>
                <th data-field="status" data-sortable="true" style="border:solid 1px #000;">
                  <center>
                ادارة
                  </center>
                </th>


              </tr>
            </thead>
            <tbody>
             @foreach($position as $item)
              <tr>
                <th style="border:solid 1px #000;"><center>{{$item->id}}</center></th>
                <th style="border:solid 1px #000;"><center>{{$item->title}}</center></th>
                <th style="border:solid 1px #000;"><center>{{$item->lat}}</center></th>
                <th style="border:solid 1px #000;">
                  <center>
                  {{$item->lng}}
                </center>
              </th>

                <th style="border:solid 1px #000;">
                  <center>
                    <a href="{{url('admin/position/'.$item->id.'/edit')}}" class="hos hos-primary edit-or-view" style="color:#000;border:solid 1px #000;">
                     <i class="fa fa-eye" aria-hidden="true"></i>
                     عرض و تعديل
                   </a>
                   <a  class="hos hos-danger delete-s" data-toggle="modal" data-target="#delete{{$item->id}}"  style="color:#000;border:solid 1px #000;">
                     <i class="fa fa-trash" aria-hidden="true"></i>
                     حذف
                   </a>
               <div class="modal fade" role="dialog" id="delete{{$item->id}}">
                 <div class="modal-dialog modal-dialog-centered" role="document" style="border:solid 1px #000;">
                   <div class="modal-content">
                     <div class="modal-body">
                       <center>
                         هل انت متأكد من حذف:
                         <a style="color:red;font-size:20px;">
                         {{$item->title}}
                       </a>
                       ؟
                       </center>
                     </div>
                     <div class="modal-footer">
                       <div class="col-md-12">
                         <a href="{{url('admin/position/'.$item->id.'/delete')}}" class="hos hos-danger"  style="color:#000;border:solid 1px #000;">
                           <i class="fa fa-trash" aria-hidden="true"></i>
                         حذف
                       </a>
                       <button type="button" class="hos hos-info" data-dismiss="modal"  style="color:#000;border:solid 1px #000;">
                         <i class="fa fa-times" aria-hidden="true"></i>
                         تراجع
                       </button>

                     </div>
                     </div>
                   </div>
                 </div>
               </div>
                 <center>
                </th>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>

@stop
