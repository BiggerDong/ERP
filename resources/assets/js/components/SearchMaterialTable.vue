<template>
    <table class="table">
        <thead>
        <tr>
            <th>物料编号</th>
            <th>物料名称</th>
            <th>物料价格</th>
            <th>当前库存</th>
            <th>安全库存</th>
            <th>库存状态</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(material,index) in materials" :class="{'danger': material.stock < material.sstock}">
            <th scope="row">{{ material.mid }}</th>
            <td>{{ material.name }}</td>
            <td>{{ material.price }}</td>
            <td>{{ material.stock }}</td>
            <td>{{ material.sstock }}</td>
            <td>{{ material.stock < material.sstock ? '库存不足' : '正常' }}</td>
            <td>
                <el-tooltip class="item" effect="dark" content="修改" placement="top">
                        <span style="color: #666;">
                            <a style="cursor: pointer;text-decoration: none;" :href="'/materials/' + material.id + '/edit'">
                                <i class="iconfont" style="color: #666;font-size: 16px;">&#xe605;</i>
                            </a>
                        </span>
                </el-tooltip>
                <el-tooltip class="item" effect="dark" content="冻结" placement="top">
                        <span style="margin-right: -20px;margin-left: 20px;color: #666;">
                            <a style="cursor: pointer;text-decoration: none;"
                               @click="open(index,material.id)" >
                                <i class="iconfont" style="color: #666;font-size: 16px;">&#xe795;</i>
                            </a>
                        </span>
                </el-tooltip>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props:['mid'],
        mounted() {
            axios.get('/api/materials/search',{
                params: {
                    mid: this.mid
                }
            }).then(response => {
                this.materials = response.data
            })
        },
        data() {
            return {
                materials: [],
            }
        },
        methods: {
            open(index,id) {
                this.$confirm('此操作将冻结该物料并不予显示, 是否继续?', '提示', {
                    confirmButtonText: '确定',
                    cancelButtonText: '取消',
                    type: 'warning',
                }).then(() => {
                    this.materials.splice(index,1),
                        axios.put('/api/materials/'+ id),
                        this.$notify({
                            type: 'success',
                            message: '冻结成功!',
                            offset: 100
                        });
                }).catch(() => {
                    return false;
                });
            }
        }
    }
</script>