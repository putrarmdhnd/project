
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
      valueField: "pengeluaran",
      categoryField: "judulPengeluaran",
      endAngle: 270
    })
  );

  series1.states.create("hidden", {
    endAngle: -90
  });
  var subsetData = chartBeranda.slice(1);
  series1.data.setAll(subsetData);
  series1.appear(1000, 100);
});

document.addEventListener("DOMContentLoaded", function () {
  am4core.useTheme(am4themes_animated);

  // Create chart instance
  var chart = am4core.create("apbdesTahunan", am4charts.XYChart);

  // Mengambil data dari server
  chart.data = chartData;

  // Create axes
  var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
  categoryAxis.dataFields.category = "tahun";
  categoryAxis.title.text = "Pemasukan Dan Pengeluaran Desa Palasari";
  categoryAxis.renderer.grid.template.location = 0;
  categoryAxis.renderer.minGridDistance = 20;
  categoryAxis.renderer.cellStartLocation = 0.1;
  categoryAxis.renderer.cellEndLocation = 0.9;

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.min = 0;
  valueAxis.title.text = "Jumlah";

  // Create series
  function createSeries(field, name, stacked) {
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = field;
    series.dataFields.categoryX = "tahun";
    series.name = name;
    series.columns.template.tooltipText = "{name}: [bold]{valueY}[/]";
    series.stacked = stacked;
    series.columns.template.width = am4core.percent(95);
  }
  createSeries("anggaran", "Anggaran");
  createSeries("jumlah", "Jumlah");
  // Add legend
  chart.legend = new am4charts.Legend();
});

