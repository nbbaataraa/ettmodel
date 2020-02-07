<template>
  <v-chart :options="polar" />
</template>

<style>
.echarts {
  width: 70%;
  height: 70%;
}
</style>

<script>
import ECharts from "vue-echarts";
import "echarts/lib/chart/pie";

export default {
  components: {
    "v-chart": ECharts
  },
  data() {
    return {
      polar: {
        tooltip: {
          trigger: "item",
          formatter: "{a} <br/>{b}: {c} ({d}%)"
        },

        series: [
          {
            name: "Test",
            type: "pie",
            selectedMode: "single",
            radius: [0, "30%"],

            label: {
              position: "inner"
            },
            labelLine: {
              show: false
            },
            data: [
              { value: 335, name: "Inner Pie 1", selected: true },
              { value: 679, name: "Inner Pie 2" },
              { value: 1548, name: "Inner Pie 3" }
            ]
          },
          {
            name: "Is This Title",
            type: "pie",
            radius: ["40%", "55%"],
            label: {
              formatter: "{a|{a}}{abg|}\n{hr|}\n  {b|{b}：}{c}  {per|{d}%}  ",
              backgroundColor: "#eee",
              borderColor: "#aaa",
              borderWidth: 1,
              borderRadius: 4,
              shadowBlur: 3,
              shadowOffsetX: 2,
              shadowOffsetY: 2,
              shadowColor: "#999",
              padding: [0, 7],
              rich: {
                a: {
                  color: "#999",
                  lineHeight: 22,
                  align: "center"
                },
                abg: {
                  backgroundColor: "#BDBDBD",
                  width: "100%",
                  align: "right",
                  height: 22,
                  borderRadius: [4, 4, 0, 0]
                },
                hr: {
                  borderColor: "#aaa",
                  width: "100%",
                  borderWidth: 0.5,
                  height: 0
                },
                b: {
                  fontSize: 16,
                  lineHeight: 33
                },
                per: {
                  color: "#eee",
                  backgroundColor: "#334455",
                  padding: [2, 4],
                  borderRadius: 2
                }
              }
            },
            data: [
              { value: 335, name: "Test11" },
              { value: 310, name: "Test12" },
              { value: 234, name: "Test13" },
              { value: 135, name: "Test14" },
              { value: 1048, name: "Test15" },
              { value: 251, name: "Test16" },
              { value: 147, name: "Test17" },
              { value: 102, name: "Test18" }
            ]
          }
        ]
      }
    };
  }
};
</script>
