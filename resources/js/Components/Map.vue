<template>
    <ol-map ref="map" :loadTilesWhileAnimating="true" :loadTilesWhileInteracting="true" style="height:84vh">
    
        <ol-view ref="view" :center="center" :rotation="rotation" :zoom="zoom" :projection="projection" />
    
        <ol-tile-layer ref="osmLayer" title="OSM">
            <ol-source-osm />
        </ol-tile-layer>
    
        <ol-mouseposition-control />    <!-- Shows coördinates at the top -->
        <ol-scaleline-control />        <!-- Shows distance relativity on the map-->

        <!--<ol-fullscreen-control />                                                                       Sets map to fullscreen-->
        <!--<ol-rotate-control />                                                                           Resets rotation back to default -->
        <!--<ol-zoom-control />                                                                             Zoom - and + buttons -->
        <!--<ol-zoomslider-control />                                                                       Zoom slider -->
        <!--<ol-zoomtoextent-control :extent="[23.906,42.812,46.934,34.597]" tipLabel="Fit to Turkey" />    E button, it centers on turkey -->
    
        <ol-context-menu :items="contextMenuItems" /> <!-- ? -->

        <!-- Selecting of a cluster and turning it into a yellow marker -->
        <ol-interaction-clusterselect @select="featureSelected" :pointRadius="20">
            <ol-style>
                <ol-style-stroke color="green" :width="5"></ol-style-stroke>
                <ol-style-fill color="rgba(255,255,255,0.5)"></ol-style-fill>
                <ol-style-icon :src="markerIcon" :scale="0.05"></ol-style-icon>
            </ol-style>
        </ol-interaction-clusterselect>
    
        <!-- ? -->
        <ol-interaction-select @select="featureSelected" :condition="selectCondition" :filter="selectInteactionFilter" v-if="!drawEnable">
            <ol-style>
                <ol-style-stroke color="green" :width="10"></ol-style-stroke>
                <ol-style-fill color="rgba(255,255,255,0.5)"></ol-style-fill>
                <ol-style-icon :src="markerIcon" :scale="0.05"></ol-style-icon>
            </ol-style>
        </ol-interaction-select>
    
        <!-- This code part allows for the creation of markers of the cluster variety -->
        <ol-animated-clusterlayer :animationDuration="500" :distance="40" title="CLUSTER" preview="https://raw.githubusercontent.com/MelihAltintas/vue3-openlayers/main/src/assets/cluster.png">
    
            <ol-source-vector ref="vectorsource">
                <ol-feature v-for="index in 500" :key="index">
                    <ol-geom-point :coordinates="[getRandomInRange(24,45,3),getRandomInRange(35,41,3)]"></ol-geom-point>
    
                </ol-feature>
            </ol-source-vector>
    
            <ol-style :overrideStyleFunction="overrideStyleFunction">
                <ol-style-stroke color="red" :width="2"></ol-style-stroke>
                <ol-style-fill color="rgba(255,255,255,0.1)"></ol-style-fill>
    
                <ol-style-circle :radius="20">
                    <ol-style-stroke color="black" :width="15" :lineDash="[]" lineCap="butt"></ol-style-stroke>
                    <ol-style-fill color="black"></ol-style-fill>
                </ol-style-circle>
    
                <ol-style-text>
                    <ol-style-fill color="white"></ol-style-fill>
                </ol-style-text>
            </ol-style>
    
        </ol-animated-clusterlayer>
    </ol-map>
    </template>
    <script>
    import {
        ref,
        inject,
        onMounted
    } from 'vue'
    
    import markerIcon from '@/../assets/marker.png'
    import starIcon from '@/../assets/star.png'
    export default {
        setup() {
            const center = ref([5.2913, 52.1326])
            const projection = ref('EPSG:4326')
            const zoom = ref(8)
            const rotation = ref(0)
    
            const format = inject('ol-format');
    
            const geoJson = new format.GeoJSON();
    
            const selectConditions = inject('ol-selectconditions')
    
            const selectCondition = selectConditions.pointerMove;
    
            const selectedCityName = ref('')
            const selectedCityPosition = ref([])
    
            const extent = inject('ol-extent');
    
            const Feature = inject('ol-feature')
            const Geom = inject('ol-geom')
    
            const contextMenuItems = ref([])
            const vectorsource = ref(null)
            const view = ref(null);
    
            const drawEnable = ref(false)
            const drawType = ref("Point")
    
            const changeDrawType = (active, draw) => {
                drawEnable.value = active
                drawType.value = draw
            }
    
            contextMenuItems.value = [{
                    text: 'Center map here',
                    classname: 'some-style-class', // add some CSS rules
                    callback: (val) => {
                        view.value.setCenter(val.coordinate)
    
                    } // `center` is your callback function
                },
                {
                    text: 'Add a Marker',
                    classname: 'some-style-class', // you can add this icon with a CSS class
                    // instead of `icon` property (see next line)
                    icon: markerIcon, // this can be relative or absolute
                    callback: (val) => {
                        console.log(val)
                        let feature = new Feature({
                            geometry: new Geom.Point(val.coordinate),
                        });
                        vectorsource.value.source.addFeature(feature)
                    }
                },
                '-' // this is a separator
            ]
    
            const featureSelected = (event) => {
                if (event.selected.length == 1) {
    
                    selectedCityPosition.value = extent.getCenter(event.selected[0].getGeometry().extent_)
                    selectedCityName.value = event.selected[0].values_.name;
                } else {
                    selectedCityName.value = '';
                }
    
            }
    
            const overrideStyleFunction = (feature, style) => {
    
                let clusteredFeatures = feature.get('features');
                let size = clusteredFeatures.length;
    
                let color = size > 20 ? "192,0,0" : size > 8 ? "255,128,0" : "0,128,0";
                var radius = Math.max(8, Math.min(size, 20));
                let dash = 2 * Math.PI * radius / 6;
                let calculatedDash = [0, dash, dash, dash, dash, dash, dash];
    
                style.getImage().getStroke().setLineDash(dash);
                style.getImage().getStroke().setColor("rgba(" + color + ",0.5)");
                style.getImage().getStroke().setLineDash(calculatedDash);
                style.getImage().getFill().setColor("rgba(" + color + ",1)");
    
                style.getImage().setRadius(radius)
    
                style.getText().setText(size.toString());
    
            }
    
            const selectInteactionFilter = (feature) => {
                return feature.values_.name != undefined;
            };
    
            const getRandomInRange = (from, to, fixed) => {
                return (Math.random() * (to - from) + from).toFixed(fixed) * 1;
    
            }
    
            const swipeControl = ref(null)
            const osmLayer = ref(null)
            const layerList = ref([])

            const animationPath = ref(null);
    
            onMounted(() => {
                layerList.value.push(osmLayer.value.tileLayer);
                console.log(layerList.value)
                console.log(animationPath.value)
            });

    
            return {
                center,
                projection,
                zoom,
                rotation,
                geoJson,
                featureSelected,
                selectCondition,
                selectedCityName,
                selectedCityPosition,
                markerIcon,
                overrideStyleFunction,
                getRandomInRange,
                contextMenuItems,
                vectorsource,
                view,
                selectInteactionFilter,
                drawEnable,
                drawType,
                layerList,
                swipeControl,
                osmLayer,
                starIcon,
                changeDrawType,
                animationPath,
            }
        },
    }
</script>