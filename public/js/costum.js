
document.addEventListener("DOMContentLoaded", function () {
  // Your code here
  let beritaPengumuman = document.querySelector("#BeritaPengumuman");
  let tentangDesa = document.querySelector("#MengenaiDesa");
  let APBDesa = document.querySelector("#Apbdes");
  let penduduk = document.querySelector("#DataKependudukan");

  let angkaJumlahPenduduk = document.querySelectorAll(".card-demografi-penduduk__jumlah");
  let titleJumlahPenduduk = document.querySelectorAll(".card-demografi-penduduk__info");

  let layoutCard = document.querySelectorAll(".layout-card");
  let cardDanaMasuk = document.querySelectorAll(".card-dana-masuk");
  let cardDanaKeluar = document.querySelectorAll(".card-dana-keluar");

  let cardimgStruktur = document.querySelectorAll(".card-imgStruktur");

  let detailPembelanjaan = document.querySelectorAll(".detailPembelanjaan");

  function checkViewportWidth() {

    if (window.innerWidth <= 450) {
      detailPembelanjaan.forEach(function (element) {
        element.classList.remove("m-4");
      });

      cardimgStruktur.forEach(function (element) {
        element.classList.add("col-12");
        element.classList.remove("col-8");
      });

      layoutCard.forEach(function (element) {
        element.classList.add("d-block");
        element.classList.remove("d-flex");
        element.classList.remove("m-2");
      });

      cardDanaMasuk.forEach(function (element) {
        element.classList.remove("col-6");
        element.classList.add("col-12");
      });

      cardDanaKeluar.forEach(function (element) {
        element.classList.remove("col-6");
        element.classList.add("col-12");
      });

      angkaJumlahPenduduk.forEach(function (element) {
        element.classList.add("text-center");
      });
      titleJumlahPenduduk.forEach(function (element) {
        element.classList.add("text-center");
      });



      beritaPengumuman.classList.add("container");
      tentangDesa.classList.add("container");

      APBDesa.classList.remove("mt-5");

      penduduk.classList.remove("p-5");
      penduduk.classList.add("p-3");



    } else {

      beritaPengumuman.classList.remove("container");
      tentangDesa.classList.remove("container");

      angkaJumlahPenduduk.forEach(function (element) {
        element.classList.remove("text-center");
      });
      titleJumlahPenduduk.forEach(function (element) {
        element.classList.remove("text-center");
      });

    }
  }
  checkViewportWidth();
  window.addEventListener("resize", checkViewportWidth);
});

document.addEventListener("DOMContentLoaded", function () {
  var root1 = am5.Root.new("apbdes");

  // Set themes
  root1.setThemes([
    am5themes_Animated.new(root1)
  ]);

  // Create first chart (Pie Chart)
  var chart1 = root1.container.children.push(
    am5percent.PieChart.new(root1, {
      endAngle: 270
    })
  );

  // Create series for the first chart
  var series1 = chart1.series.push(
    am5percent.PieSeries.new(root1, {
      valueField: "value",
      categoryField: "category",
      endAngle: 270
    })
  );

  series1.states.create("hidden", {
    endAngle: -90
  });

  // Set data for the first chart
  series1.data.setAll([
    { category: "Aplikasi Web Desa", value: 501.9 },
    { category: "Acara 1 Muharom", value: 301.9 },
    { category: "Kerja Bakti", value: 201.1 }
  ]);

  series1.appear(1000, 100);
});

document.addEventListener("DOMContentLoaded", function () {
  var root = am5.Root.new("apbdesTahunan");

  // Set themes
  root.setThemes([
    am5themes_Animated.new(root)
  ]);

  // Create chart
  var chart = root.container.children.push(am5xy.XYChart.new(root, {
    panX: false,
    panY: false,
    wheelX: "panX",
    wheelY: "zoomX",
    layout: root.verticalLayout
  }));

  // Add legend
  var legend = chart.children.push(
    am5.Legend.new(root, {
      centerX: am5.p50,
      x: am5.p50
    })
  );

  var data = [{
    "year": "2022",
    "dana_masuk": 50000000,
    "dana_keluar": 48000000
  }, {
    "year": "2023",
    "dana_masuk": 50000000,
    "dana_keluar": 49000000
  }];

  // Create axes
  var xRenderer = am5xy.AxisRendererX.new(root, {
    cellStartLocation: 0.1,
    cellEndLocation: 1.0
  });

  var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
    categoryField: "year",
    renderer: xRenderer,
    tooltip: am5.Tooltip.new(root, {})
  }));

  xRenderer.grid.template.setAll({
    location: 1,
    oversizedBehavior: "wrap",
    maxWidth: 100,
    fontSize: 12,
    textAlign: "center"
  });

  xAxis.data.setAll(data);

  var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
    renderer: am5xy.AxisRendererY.new(root, {
      strokeOpacity: 0.1
    })
  }));

  // Add series
  function makeSeries(name, fieldName, color) {
    var series = chart.series.push(am5xy.ColumnSeries.new(root, {
      name: name,
      xAxis: xAxis,
      yAxis: yAxis,
      valueYField: fieldName,
      categoryXField: "year",
      fill: am5.color(color), // Set the color here
    }));

    series.columns.template.setAll({
      tooltipText: "Rp. {valueY}",
      width: am5.percent(60),
      tooltipY: 0,
      strokeOpacity: 0
    });

    series.data.setAll(data);

    // Make stuff animate on load
    series.appear();

    series.bullets.push(function () {
      return am5.Bullet.new(root, {
        locationY: 0,
        sprite: am5.Label.new(root, {
          text: "Rp{valueY}",
          fill: root.interfaceColors.get("alternativeText"),
          centerX: am5.percent(50),
          centerY: am5.percent(100),
          textAlign: "center",
          populateText: true
        })
      });
    });

    legend.data.push(series);
  }

  // Set colors for each series
  makeSeries("Dana Masuk", "dana_masuk", "#288628");
  makeSeries("Dana Keluar", "dana_keluar", "#ff3700");

  // Make stuff animate on load
  chart.appear(1000, 100);
});