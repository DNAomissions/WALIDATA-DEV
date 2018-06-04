    require([
      "esri/Map",
      "esri/views/MapView",
      "esri/widgets/Home",
      "esri/widgets/Locate",
      "esri/widgets/Expand",
      "esri/widgets/BasemapGallery",
      "esri/widgets/CoordinateConversion",
      "esri/core/watchUtils",
      "dojo/dom",
      "dojo/promise/all",
      "esri/widgets/Search",
      "dojo/domReady!"
    ], function(
      Map, MapView, Home, Locate, Expand, BasemapGallery, CoordinateConversion, watchUtils, dom, all, Search
    ) {

      var map = new Map({
        basemap: "streets"
      });

      var overviewMap = new Map({
        basemap: "topo"
      });

      var view = new MapView({
        container: "viewDiv",
        map: map,
        zoom: 5,
        center: [116.56,-2.22] // longitude, latitude
      });

      var homeBtn = new Home({
        view: view
      });

      var locateBtn = new Locate({
        view: view
      });
      // Create a BasemapGallery widget instance and set 
      // its container to a div element

      var basemapGallery = new BasemapGallery({
        view: view,
        container: document.createElement("div")
      });

      // Create an Expand instance and set the content
      // property to the DOM node of the basemap gallery widget
      // Use an Esri icon font to represent the content inside
      // of the Expand widget

      var bgExpand = new Expand({
        view: view,
        content: basemapGallery.container,
        expandIconClass: "esri-icon-basemap"
      });

      var ccWidget = new CoordinateConversion({
        view: view
      });

      // Create the MapView for overview map
      var mapView = new MapView({
        container: "overviewDiv",
        map: overviewMap,
        constraints: {
          rotationEnabled: false
        }
      });
      // Remove the default widgets
      mapView.ui.components = [];

      var extentDiv = dom.byId("extentDiv");

      mapView.when(function() {
        // Update the overview extent whenever the MapView or SceneView extent changes
        view.watch("extent", updateOverviewExtent);
        mapView.watch("extent", updateOverviewExtent);

        // Update the minimap overview when the main view becomes stationary
        watchUtils.when(view, "stationary", updateOverview);

        function updateOverview() {
          // Animate the MapView to a zoomed-out scale so we get a nice overview.
          // We use the "progress" callback of the goTo promise to update
          // the overview extent while animating
          mapView.goTo({
            center: view.center,
            scale: view.scale * 10 * Math.max(view.width /
              mapView.width,
              view.height / mapView.height)
          });
        }

        function updateOverviewExtent() {
          // Update the overview extent by converting the SceneView extent to the
          // MapView screen coordinates and updating the extentDiv position.
          var extent = view.extent;

          var bottomLeft = mapView.toScreen(extent.xmin, extent.ymin);
          var topRight = mapView.toScreen(extent.xmax, extent.ymax);

          extentDiv.style.top = topRight.y + "px";
          extentDiv.style.left = bottomLeft.x + "px";

          extentDiv.style.height = (bottomLeft.y - topRight.y) + "px";
          extentDiv.style.width = (topRight.x - bottomLeft.x) + "px";
        }
      });

      var over = new Expand({
        view: view,
        content: mapView.container,
        expandIconClass: "esri-icon-visible"
      });

      var searchWidget = new Search({
        view: view
      });

      // Add the search widget to the very top left corner of the view
      view.ui.add(searchWidget, {
          position: "manual",
          index: 1000,
      });

      view.ui.add(over, "top-right");

      // Add the expand instance to the ui
      view.ui.add(bgExpand, "bottom-right");

      // Add the home button to the top left corner of the view
      view.ui.add(homeBtn, "top-left");
       view.ui.add(locateBtn, {
        position: "top-left"
      });

      
    });