module.exports = [

    {
        entry: {
            "node-page": "./app/components/node-page.vue",
            "widget-people": "./app/components/widget-people.vue"
        },
        output: {
            filename: "./app/bundle/[name].js"
        },
        module: {
            loaders: [
                { test: /\.vue$/, loader: "vue" }
            ]
        }
    }

];
