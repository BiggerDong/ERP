<template>
    <el-menu theme="dark" :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
            <img src="http://ot4aplrlt.bkt.clouddn.com/ERP-logo-home.png" height="30px" alt="ERP.info"
                 style="margin-left: 20px;margin-top:15px;">
            <span style="color:#666676">Beta</span>
        <el-menu-item index="3" style="float: right;">
            <i class="el-icon-loading" style="margin-left: -12px;"></i>
            <a href="/home" style="text-decoration: none;">双星信息管理系统</a>
        </el-menu-item>
        <el-submenu index="1" style="float: right;">
                <template slot="title">{{ username }}</template>
                <el-menu-item index="1-1">
                    <a href="/logout" style="text-decoration: none;">退出登录</a>
                </el-menu-item>
            </el-submenu>
    </el-menu>
</template>

<script>
    export default {
        props:['username'],
        data() {
            return {
                activeIndex: '',
            };
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>
