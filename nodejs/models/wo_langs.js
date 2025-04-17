module.exports = function(sequelize, DataTypes) {
                          return sequelize.define('Wo_Langs', {
                            id: {
                              autoIncrement: true,
                              type: DataTypes.INTEGER,
                              allowNull: false,
                              primaryKey: true
                            },
                            lang_key: {
                              type: DataTypes.STRING(160),
                              allowNull: true
                            },
                            type: {
                              type: DataTypes.STRING(100),
                              allowNull: false,
                              defaultValue: ""
                            },english: {type: DataTypes.TEXT,
                        allowNull: true
                       },vietnamese: {type: DataTypes.TEXT,
                        allowNull: true
                       }}, {
                            sequelize,
                            timestamps: false,
                            tableName: 'Wo_Langs'
                          });
                        };