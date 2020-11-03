<template>
  <v-app>
    <v-layout justify-space-between row fill-height wrap>
      <v-flex xs12 md5>
        <v-chart :options="line" />
      </v-flex>
      <v-flex xs12 md5>
        <v-chart :options="polar" />
      </v-flex>
    </v-layout>

    <v-layout justify-space-between row fill-height wrap>
      <v-flex xs12 md5>
        <v-chart :options="line2" />
      </v-flex>
      <v-flex xs12 md5>
        <v-chart :options="line3" />
      </v-flex>
    </v-layout>
  </v-app>
</template>

<style>
.echarts {
  width: 100%;
  height: 70%;
}
</style>

<script>
import ECharts from "vue-echarts";
import "echarts/lib/chart/pie";
import "echarts/lib/chart/line";
import "echarts/lib/chart/bar";

export default {
  components: {
    "v-chart": ECharts,
  },
  data() {
    return {
      polar: {
        tooltip: {
          trigger: "item",
          formatter: "{a} <br/>{b}: {c} ({d}%)",
        },

        series: [
          {
            name: "Test",
            type: "pie",
            selectedMode: "single",
            radius: [0, "30%"],

            label: {
              position: "inner",
            },
            labelLine: {
              show: false,
            },
            data: [
              { value: 335, name: "Inner Pie 1", selected: true },
              { value: 679, name: "Inner Pie 2" },
              { value: 1548, name: "Inner Pie 3" },
            ],
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
                  align: "center",
                },
                abg: {
                  backgroundColor: "#BDBDBD",
                  width: "100%",
                  align: "right",
                  height: 22,
                  borderRadius: [4, 4, 0, 0],
                },
                hr: {
                  borderColor: "#aaa",
                  width: "100%",
                  borderWidth: 0.5,
                  height: 0,
                },
                b: {
                  fontSize: 16,
                  lineHeight: 33,
                },
                per: {
                  color: "#eee",
                  backgroundColor: "#334455",
                  padding: [2, 4],
                  borderRadius: 2,
                },
              },
            },
            data: [
              { value: 335, name: "Test11" },
              { value: 310, name: "Test12" },
              { value: 234, name: "Test13" },
              { value: 135, name: "Test14" },
              { value: 1048, name: "Test15" },
              { value: 251, name: "Test16" },
              { value: 147, name: "Test17" },
              { value: 102, name: "Test18" },
            ],
          },
        ],
      },
      line: {
        legend: {},
        tooltip: {},
        dataset: {
          source: [
            ["product", "2015", "2016", "2017"],
            ["Matcha Latte", 43.3, 85.8, 93.7],
            ["Milk Tea", 83.1, 73.4, 55.1],
            ["Cheese Cocoa", 86.4, 65.2, 82.5],
            ["Walnut Brownie", 72.4, 53.9, 39.1],
          ],
        },
        xAxis: { type: "category" },
        yAxis: {},
        // Declare several bar series, each will be mapped
        // to a column of dataset.source by default.
        series: [{ type: "bar" }, { type: "bar" }, { type: "bar" }],
      },
      line2: {
        legend: {},
        tooltip: {},
        dataset: {
          source: [
            ["product", "2015", "2016", "2017"],
            ["Matcha Latte", 43.3, 85.8, 93.7],
            ["Milk Tea", 83.1, 73.4, 55.1],
            ["Cheese Cocoa", 86.4, 65.2, 82.5],
            ["Walnut Brownie", 72.4, 53.9, 39.1],
          ],
        },
        xAxis: { type: "category" },
        yAxis: {},
        // Declare several bar series, each will be mapped
        // to a column of dataset.source by default.
        series: [{ type: "bar" }, { type: "bar" }, { type: "bar" }],
      },
      line3: {
        xAxis: {
          type: "category",
          boundaryGap: false,
        },
        yAxis: {
          type: "value",
          boundaryGap: [0, "30%"],
        },
        visualMap: {
          type: "piecewise",
          show: false,
          dimension: 0,
          seriesIndex: 0,
          pieces: [
            {
              gt: 1,
              lt: 3,
              color: "rgba(0, 180, 0, 1)",
            },
            {
              gt: 5,
              lt: 7,
              color: "rgba(0, 180, 0, 0.5)",
            },
          ],
        },
        series: [
          {
            type: "line",
            smooth: 0.6,
            symbol: "none",
            lineStyle: {
              color: "green",
              width: 1,
            },
            markLine: {
              symbol: ["none", "none"],
              label: { show: true },
              data: [{ xAxis: 1 }, { xAxis: 3 }, { xAxis: 5 }, { xAxis: 7 }],
            },
            areaStyle: {},
            data: [
              ["2019-10-10", 200],
              ["2019-10-11", 400],
              ["2019-10-12", 650],
              ["2019-10-13", 500],
              ["2019-10-14", 250],
              ["2019-10-15", 300],
              ["2019-10-16", 450],
              ["2019-10-17", 300],
              ["2019-10-18", 100],
            ],
          },
        ],
      },
    };
  },
};
</script>
<style >
a {
  text-decoration: none;
}
</style>