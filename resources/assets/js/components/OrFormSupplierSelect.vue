<template>
    <el-select v-model="value" size="small" placeholder="请选择" name="receiver" style="width:145px;">
        <el-option
                v-for="item in options"
                :key="item.id"
                :label="item.sid"
                :value="item.id"
        >
        </el-option>
    </el-select>
</template>

<script>
    export default {
        mounted() {
            axios.get('/api/bills/or/search').then(response => {
                this.options = response.data
            })
        },
        data() {
            return {
                options: [],
                value: ''
            }
        }
    }
</script>