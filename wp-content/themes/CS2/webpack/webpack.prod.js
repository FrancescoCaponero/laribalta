const merge = require('webpack-merge');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CopyPlugin = require('copy-webpack-plugin');
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const common = require('./webpack.common.js');

module.exports = merge.merge(common, {
  mode: 'production',
  devtool: 'source-map',
  optimization: {
    minimizer: [
      new CssMinimizerPlugin({
        minimizerOptions: {
          preset: [
            'default',
            {
              discardComments: { removeAll: true }, // Rimuove i commenti
              normalizeWhitespace: { exclude: false }, // Minimizza gli spazi bianchi
              mergeRules: false, // Unisce le regole CSS identiche o quasi
              mergeLonghand: false, // Unisce le proprietà longhand in shorthand dove possibile
              minifyFontValues: { removeQuotes: true }, // Rimuove i doppi apici attorno ai nomi dei font quando possibile
              discardDuplicates: true, // Scarta i duplicati
              discardOverridden: true, // Scarta le regole CSS sovrascritte successivamente
            },
          ],
        },
      }),
    ],
  },
  plugins: [
    new CopyPlugin({
      patterns: [
        { from: 'node_modules/swiper', to: 'libraries/swiper/' },
      ],
    }),
    new MiniCssExtractPlugin({
      filename: '[name].css',
      chunkFilename: '[id].css'
    }),
    // Non è più necessario aggiungere qui cssnano-webpack-plugin
  ],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          'style-loader',
          'css-loader',
          'sass-loader'
        ],
      },
      {
        test: /\.s[ac]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          { loader: 'css-loader', options: { url: false } },
          "sass-loader",
        ]
      },
    ]
  }
});
