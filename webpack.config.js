const path = require ('path')
const {CleanWebpackPlugin} = require ('clean-webpack-plugin')
const CopyWebpackPlugin = require ('copy-webpack-plugin')
const HtmlWebpackPlugin = require ('html-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')

module.exports = {
    entry: ['./src/index.js', './src/style/style.scss'],
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: `[name].bundle.${new Date().getTime()}.js`
    },
    mode: 'production',
    devServer: {
        port: 5555,
        open: true
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: 'bundle.css'
        }),
        new CleanWebpackPlugin(),
        new HtmlWebpackPlugin ({
            template: './src/html/index.html',
            inject: 'body',
            minify: false
        }),
        new CopyWebpackPlugin({
            patterns: [
                {
                    from: './src/assets'
                }
            ]
        })

    ],
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /(node_modules)/,
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: ['@babel/preset-env']
                    }
                }
            },
            {
                test: /\.(sa|sc|c)ss$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader
                    },
                    {
                        loader: 'css-loader'
                    },
                    {
                        loader: 'postcss-loader'
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            implementation: require('sass')
                        }
                    }
                ]
            },{
                test: /\.(png|gif|jpe?g|svg|bmp|webp)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            outputPath: 'images',
                            name: '[name].[ext]'
                        }
                    }
                ]
            },
            {
                test: /\.(woff2?|ttf|otf|eot)$/,
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            outputPath: 'fonts'
                        }
                    }
                ]
            }
           
        ]
            
        }
    
}

