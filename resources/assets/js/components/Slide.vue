<template>
    <el-menu theme="dark" class="el-menu-vertical-demo" @open="handleOpen" @close="handleClose">
        <el-submenu index="1">
            <template slot="title"><i class="el-icon-upload"></i>基础数据</template>
                <el-menu-item index="1-1"><a href="/materials" style="text-decoration: none;color: #bfcbd9;">物料主数据</a></el-menu-item>
            <el-submenu index="1-2">
                <template slot="title">业务伙伴主数据</template>
                <el-menu-item index="1-2-1">
                    <a href="/suppliers" style="text-decoration: none;color: #bfcbd9;">供应商主数据</a>
                </el-menu-item>
                <el-menu-item index="1-2-2">客户主数据</el-menu-item>
            </el-submenu>
            <el-menu-item index="1-3">价格主数据</el-menu-item>
            <el-menu-item index="1-4">总账主数据</el-menu-item>
            <el-menu-item index="1-5">银行主数据</el-menu-item>
        </el-submenu>
        <el-submenu index="2">
            <template slot="title"><i class="el-icon-document"></i>采购管理</template>
            <el-menu-item index="2-1"><a href="/bills/st/create" style="text-decoration: none;color: #bfcbd9;">缺货统计</a></el-menu-item>
            <el-menu-item index="2-2"><a href="/bills/or/create" style="text-decoration: none;color: #bfcbd9;">制定采购订单</a></el-menu-item>
            <el-menu-item index="2-3"><a href="/bills/ai/create" style="text-decoration: none;color: #bfcbd9;">收货</a></el-menu-item>
            <el-menu-item index="2-4"><a href="/bills/di/create" style="text-decoration: none;color: #bfcbd9;">退货</a></el-menu-item>
            <el-menu-item index="2-5"><a href="/bills/pi/create" style="text-decoration: none;color: #bfcbd9;">应付发票</a></el-menu-item>
        </el-submenu>
        <el-menu-item index="3"><i class="el-icon-star-on"></i>销售管理</el-menu-item>
        <el-menu-item index="4"><i class="el-icon-setting"></i>库存管理</el-menu-item>
        <el-menu-item index="5"><i class="el-icon-message"></i>财务管理</el-menu-item>
    </el-menu>
</template>

<script>
    export default {
        methods: {
            handleOpen(key, keyPath) {
                console.log(key, keyPath);
            },
            handleClose(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>