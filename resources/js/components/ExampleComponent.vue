<template>
    <div class="container">
        <div style="margin-bottom:20px;">
            <button class="btn btn-primary" @click="filterByUSer = true,filterByMoves =false ,filterByCat = false">حركة
                الحضور والانصراف بناء علي اسم الموظف
            </button>
            <button class="btn btn-primary" @click="filterByUSer = false,filterByMoves =true ,filterByCat = false">حركات
                الحضور والانصراف بناء علي التاريخ
            </button>
        </div>
        <div v-if="filterByUSer">
            <div class="row">
                <div class="col-lg-4">
                    <select v-model="userID" class="form-control" style="width:100%">
                        <option value=""></option>
                        <option v-for="user in users" :value="user.id">{{user.name}}</option>
                    </select>
                    <button style="margin-top:10px;" @click="userID = ''" class="btn btn-info">مسح</button>
                </div>

                <div class="col-lg-4">
                    <input v-model="startDate" type="date" class="form-control" dir="rtl" style="width: 100%;">
                    <button style="margin-top:10px;" @click="startDate = ''" class="btn btn-info">مسح</button>
                </div>
                <div class="col-lg-4">
                    <input v-model="endDate" type="date" class="form-control" style="width: 100%;" dir="rtl">
                    <button style="margin-top:10px;" @click="endDate = ''" class="btn btn-info">مسح</button>
                </div>

            </div>
            <div class="box" style="margin-top:50px;">
                <h1 v-if="userID ==''" style="text-align:center;margin-bottom:10px;">لم تقم باختيار موظف</h1>
                <div class="box-body" v-if="userID!=''">
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
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Browser: activate to sort column ascending">الوقت
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <template v-for="l in userFilteredMoves">
                                        <tr role="row" class="odd">
                                            <td style="text-align:center"><span
                                                    :class="l.status=='l'?'label label-danger':'label label-success'">{{l.status=='l' ? "انصراف" : "حضور"}}</span>
                                            </td>
                                            <td>{{moment(l.created_at).locale('ar-sa').format('D MMMM YYYY, h:mm a')}}
                                            </td>
                                            <td style="text-align: center">
                                                <button @click="deleteMove(l)" type="button" class="btn btn-danger">
                                                    حذف
                                                </button>
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
        <div v-if="filterByMoves">
            <div class="row">
                <div class="col-lg-4">
                    <input v-model="startDate" type="date" class="form-control" dir="rtl" style="width: 100%;">
                    <button style="margin-top:10px;" @click="startDate = ''" class="btn btn-info">مسح</button>
                </div>
                <div class="col-lg-4">
                    <input v-model="endDate" type="date" class="form-control" style="width: 100%;" dir="rtl">
                    <button style="margin-top:10px;" @click="endDate = ''" class="btn btn-info">مسح</button>
                </div>
            </div>
            <div class="box">
                <div class="box-body">
                    <div class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" role="grid"
                                       aria-describedby="example2_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">الاسم
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">الحالة
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Browser: activate to sort column ascending">الوقت
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                            colspan="1"
                                            aria-label="Platform(s): activate to sort column ascending">
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <template v-for="l in filteredMoves">
                                        <tr role="row" class="odd">
                                            <td style="text-align:center">{{l.user.name}}</td>
                                            <td style="text-align:center"><span
                                                    :class="l.status=='l'?'label label-danger':'label label-success'">{{l.status=='l' ? "انصراف" : "حضور"}}</span>
                                            </td>
                                            <td>{{moment(l.created_at).locale('ar-sa').format('D MMMM YYYY, h:mm a')}}
                                            </td>
                                            <td style="text-align: center">
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
        <div v-if="filterByCat">

        </div>
    </div>
</template>

<script>

    export default {
        data: function () {
            return {
                filterByUSer: true,
                filterByCat: false,
                filterByMoves: false,
                users: [],
                moves: [],
                userID: '',
                selectedUser: [],
                userMoves: [],
                startDate: '',
                endDate: ''
            }
        },
        watch: {
            userID: function (val) {
                this.selectedUser = this.users.filter((user) => {
                    return user.id == val;
                })[0];
                if (this.selectedUser != undefined)
                    this.userMoves = this.selectedUser.leaving_coming;
                else if (this.selectedUser == undefined) {
                    this.userMoves = [];
                }
            }
        },
        computed: {
            userFilteredMoves() {
                return this.userMoves.filter((move) => {
                    if (this.startDate == "" && this.endDate == "")
                        return moment(move.created_at).isSameOrAfter(0, 'day') && moment(move.created_at).isSameOrBefore(undefined, 'day');
                    else if (this.startDate != "" && this.endDate != "")
                        return moment(move.created_at).isBetween(this.startDate, this.endDate, 'day', '[]');
                    else if (this.startDate != "")
                        return moment(move.created_at).isSameOrAfter(this.startDate, 'day');
                    else if (this.endDate != "")
                        return moment(move.created_at).isSameOrBefore(this.endDate, 'day');
                })
            },
            filteredMoves() {
                return this.moves.filter((move) => {
                    if (this.startDate == "" && this.endDate == "")
                        return moment(move.created_at).isSameOrAfter(0, 'day') && moment(move.created_at).isSameOrBefore(undefined, 'day');
                    else if (this.startDate != "" && this.endDate != "")
                        return moment(move.created_at).isBetween(this.startDate, this.endDate, 'day', '[]');
                    else if (this.startDate != "")
                        return moment(move.created_at).isSameOrAfter(this.startDate, 'day');
                    else if (this.endDate != "")
                        return moment(move.created_at).isSameOrBefore(this.endDate, 'day');
                })
            }
        },
        methods: {
            deleteMove(move) {
                let data = {
                    move_id: move.id
                }
                window.axios.post('/admin/staff/deleteLeavingComing', data).then(res => {
                    console.log(res.data.moves);
                    this.users = res.data.users;
                    this.moves = res.data.moves;
                    this.userMoves = this.users.filter((user) => {
                        return this.userID == user.id
                    })[0].leaving_coming;
                })
            }
        },
        mounted() {
            window.axios.get('/admin/staff/leavingComing').then((res) => {
                this.users = res.data.users;
                this.moves = res.data.moves;
                this.userID = this.users[0].id;
            });
        }
    }
</script>
