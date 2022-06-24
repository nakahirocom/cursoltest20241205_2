'use strict';

const {Sequelize, DataTypes} = require('sequelize');
const sequelize = new Sequelize(
// TODO: 環境変数として渡す
  'postgres://postgres:postgres@db/sentaku'
);

module.exports = {
  sequelize,
  DataTypes
};