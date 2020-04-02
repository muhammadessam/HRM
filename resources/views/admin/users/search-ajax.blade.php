
        <div class="fresh-table toolbar-color-blue">
          <div class="toolbar">
          </div>

          <table id="fresh-table" class="table">
            <thead>
              <tr class="hos-info" style="width:100%;">
                <th data-field="id"><center>#</center></th>
                <th data-field="name" data-sortable="true">
                  <center>
                  الموظف
                  </center>
                </th>

                <th data-field="salary" data-sortable="true">
                  <center>
                الرقم الوظيفي
                  </center>
                </th>
                <th data-field="status" data-sortable="true">
                  <center>
                  الحالة
                  </center>
                </th>

                <th data-field="date" data-sortable="true">
                  <center>
                الوقت و التاريخ
                  </center>
                </th>

              </tr>
            </thead>
            <tbody>
             @foreach($data as $item)
              <tr>
                <th><center>{{$item->id}}</center></th>
                <th><center>{{\App\User::find($item->user)->name}}</center></th>
                <th><center>{{\App\User::find($item->user)->matriculate}}</center></th>
                <th>
                  <center>
                  @if($item->status == 'c')
                   <button type="button" class="btn btn-warning">
                    حاضر في الوقت الحالي
                   </button>
                   @endif


                   @if($item->status == 'l')
                   <button type="button" class="btn btn-danger">
                    خارج الدوام
                   </button>
                   @endif
                </center>
              </th>

                <th>
                    <center>
                      {{$item->created_at}}
                   <center>
                </th>
              </tr>
             @endforeach
            </tbody>
          </table>
        </div>
