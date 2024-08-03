const path = require('path');

module.exports = {
  entry: {
    app: ['./src/js/app.js', './src/scss/style.scss', './src/scss/font.scss'],
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist')
  },
  plugins: [],
  optimization: {
    splitChunks: {
      chunks: 'all'
    }
  },
  stats: {
    colors: true
  },
  module: {
    rules: [
      {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      {
        test: /\.(woff(2)?|eot|ttf|otf|svg|)$/,
        type: 'asset',   // <-- Assets module - asset
        generator: {  //If emitting file, the file path is
          filename: 'fonts/[hash][ext][query]'
        }
      }
    ]
  }
};
