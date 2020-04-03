<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <select v-model="userID" class="form-control" style="width:100%">
                    <option v-for="user in users" :value="user.id">{{user.name}}</option>
                </select>
            </div>
        </div>
        <div class="box" style="margin-top:50px;">

            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                   aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">الحالة
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">الوقت
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">اجراء
                                    </th>

                                </tr>
                                </thead>
                                <tbody>

                                <template v-for="l in userMoves">
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{l.status=='l' ? "انصراف" : "حضور"}}</td>
                                        <td>{{l.created_at}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger">حذف</button>
                                        </td>
                                    </tr>
                                </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {

                users: [],
                moves: [],
                userID: 1,
                selectedUser : [],
                userMoves: [],
                startingDate: '',
                endDate: ''
            }
        },
        watch: {
            userID:function (val) {
                this.selectedUser = this.users.filter((user)=>{
                    return user.id==val;
                })[0];
                this.userMoves = this.selectedUser.leaving_coming;
            }
        },
        computed: {},
        methods: {},
        mounted() {
            window.axios.get('/admin/staff/leavingComing').then((res) => {
                this.users = res.data.users;
                this.moves = res.data.moves;
                this.userID = this.users[0].id;
                this.pickedUser = this.users[0];
            });
        }
    }
</script>
