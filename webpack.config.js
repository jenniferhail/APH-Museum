const path = require("path");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

// if (mode === 'production') {
// 	loaders.unshift('file-loader', 'extract-loader');
// } else {
// 	loaders.unshift('style-loader');
// }

module.exports = {
	mode: "development",
	entry: ["./src/js/index.js"],
	output: {
		filename: "[name].js",
		path: path.resolve(__dirname, "dist"),
		publicPath: "",
	},
	devtool: "inline-source-map",
	devServer: {
		contentBase: "./dist",
	},
	module: {
		rules: [
			{
				test: /\.(png|svg|jpg|jpeg|gif|mp3)$/i,
				type: "asset/resource",
				generator: {
					//If emitting file, the file path is
					filename: "images/[name][ext][query]",
				},
			},
			{
				test: /\.s[ac]ss$/i,
				use: [
					// fallback to style-loader in development
					process.env.NODE_ENV !== "production"
						? "style-loader"
						: MiniCssExtractPlugin.loader,
					"css-loader",
					"sass-loader",
				],
			},
			// There's a good example that's worth checking out later
			// in how to include multiple HTML files.
			// https://www.youtube.com/watch?v=y_RFOaSDL8I
		],
	},
	plugins: [
		new CleanWebpackPlugin({
			cleanStaleWebpackAssets: false,
		}),
		new HtmlWebpackPlugin({
			title: "Development",
			// Load a custom template (lodash by default)
			filename: "index.html",
			template: "src/pages/index.html",
		}),
		new HtmlWebpackPlugin({
			title: "Single",
			filename: "single.html",
			template: "src/pages/single.html",
		}),
		new HtmlWebpackPlugin({
			title: "In Progress",
			filename: "in-progress.html",
			template: "src/pages/in-progress.html",
		}),
		new HtmlWebpackPlugin({
			title: "404",
			filename: "404.html",
			template: "src/pages/404.html",
		}),
		new HtmlWebpackPlugin({
			title: "Carbon",
			filename: "carbon.html",
			template: "src/pages/carbon.html",
		}),
		new HtmlWebpackPlugin({
			title: "Carbon Update",
			filename: "carbon-update.html",
			template: "src/pages/carbon-update.html",
		}),
		new MiniCssExtractPlugin({
			// Options similar to the same options in webpackOptions.output
			// both options are optional
			filename: "[name].css",
			chunkFilename: "[id].css",
		}),
	],
};
