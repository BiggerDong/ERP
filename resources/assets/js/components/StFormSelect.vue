<template>
    <el-select v-model="value" placeholder="请选择" name="material_id">
        <el-option
                v-for="item in options"
                :key="item.id"
                :label="item.mid"
                :value="item.id"
                >
        </el-option>
    </el-select>
</template>

<script>
    export default {
        mounted() {
            axios.get('/api/bills/st/search').then(response => {
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