<template>
    <el-input placeholder="输入数量" v-model="input" name="amount">
        <template slot="append">单位</template>
    </el-input>
</template>
<script>
    export default {
        data() {
            return {
                input: ''
            };
        },
    };
</script>