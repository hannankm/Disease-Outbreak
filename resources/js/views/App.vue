<template>
    <el-button type="primary">Hello from Element Plus</el-button>
  </template>
  
  <script>
    import * as echarts from 'echarts';

  export default {
    name: "App",
    mounted() {
      const chart = echarts.init(this.$refs.chart);
      chart.setOption({
        title: {
          text: 'ECharts Example'
        },
        tooltip: {},
        xAxis: {
          data: ['A', 'B', 'C', 'D', 'E']
        },
        yAxis: {},
        series: [{
          name: 'Example',
          type: 'bar',
          data: [10, 20, 30, 40, 50]
        }]
      })
    }
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
