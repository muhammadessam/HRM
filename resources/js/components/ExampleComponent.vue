<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label>اسم الموظف</label>
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1"
                            aria-hidden="true">

                        <option>شیراز</option>

                    </select>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                users: [],
                moves: [],
                pickedUser: null,
                startingDate: null,
                endDate: null
            }
        },
        mounted() {
            window.axios.get('/admin/staff/leavingComing').then((res) => {
                console.log(res.data);
            });
        }
    }
</script>
