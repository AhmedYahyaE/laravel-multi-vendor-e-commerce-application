
const xArray6 = [8, 22, 35, 40, 55];
const yArray6 = ["Others","Google","Tiktok","Instagram","Facebook"];

const data6 = [{
x: xArray6,
y: yArray6,
type: "bar",
orientation: "h",
marker: {color:"#87cbb9"}
}];

// Define Layout
const layout6 = {
margin: {t:30, l:60, b:25, r:15}
};

var config = {responsive: true}

Plotly.newPlot("socials-chart", data6, layout6, config);



const xArray = [50,60,70,80,90,100,110,120,130,140,150];
const yArray = [7,8,8,9,9,9,10,11,14,14,15];

// Define Data
const data = [{
x: xArray,
y: yArray,
mode:"lines"
}];

// Define Layout
const layout = {
xaxis: { 
range: [40, 150]
},
yaxis: { 
range: [5, 16]
},
margin: {t:30, l:10, b:25, r:15}
};

var config = {responsive: true}

// Display using Plotly
Plotly.newPlot("revenue-chart", data, layout, config);
                                                                    
                                             


const xArray2 = [40,50,60,70,80,90,100,110,120,130,140];
const yArray2 = [5,6,6,7,7,8,9,10,13,13,14];

// Define Data
const data2 = [{
x: xArray2,
y: yArray2,
mode:"lines"
}];

// Define Layout
const layout2 = {
xaxis: { 
range: [50, 150]
},
yaxis: { 
range: [7, 16]
},
margin: {t:30, l:10, b:25, r:15}
};

var config = {responsive: true}

// Display using Plotly
Plotly.newPlot("visitors-chart", data2, layout2, config);
                                                                      


const xArray3 = [60,70,80,90,100,110,120,130,140,150,160];
const yArray3 = [8,9,9,10,10,11,12,13,16,16,17];

// Define Data
const data3 = [{
x: xArray3,
y: yArray3,
mode:"lines"
}];

// Define Layout
const layout3 = {
xaxis: { 
range: [50, 150]
},
yaxis: { 
range: [6, 16]
},
margin: {t:30, l:10, b:25, r:15}
};

var config = {responsive: true}

// Display using Plotly
Plotly.newPlot("buyers-chart", data3, layout3, config);
                                                                     


const xArray4 = [70,80,90,100,110,120,130,140,150,160,170];
const yArray4 = [9,10,10,11,11,12,13,14,17,17,18];

// Define Data
const data4 = [{
x: xArray4,
y: yArray4,
mode:"lines"
}];

// Define Layout
const layout4 = {
xaxis: { 
range: [60, 150]
},
yaxis: { 
range: [7, 16]
},
margin: {t:30, l:10, b:25, r:15}
};

var config = {responsive: true}

// Display using Plotly
Plotly.newPlot("pageviews-chart", data4, layout4, config);
                                                                 


const xArray5 = [80,90,100,110,120,130,140,150,160,170,180];
const yArray5 = [10,11,11,12,12,13,14,15,18,18,19];

// Define Data
const data5 = [{
x: xArray5,
y: yArray5,
mode:"lines"
}];

// Define Layout
const layout5 = {
xaxis: { 
range: [70, 150]
},
yaxis: { 
range: [8, 16]
},
margin: {t:30, l:10, b:25, r:15}
};

var config = {responsive: true}

// Display using Plotly
Plotly.newPlot("orders-chart", data5, layout5, config);
                                                                     

const xArray7 = ["Mobile", "Desktop", "Tablet", "Other"];
const yArray7 = [55, 24, 18, 3];


const data7 = [
{
labels:xArray7,
values:yArray7, 
type:"pie",
marker: {
colors: ['#5f7a61', '#6f9685', '#81bfad', '#87cbb9'] 
}
}];

// Define Layout
const layout7 = {
margin: {t:10, l:10, b:10, r:10}
};

var config7 = {responsive: true}
Plotly.newPlot("device-chart", data7, layout7, config);
                                              