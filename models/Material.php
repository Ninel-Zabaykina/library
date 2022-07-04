<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $id
 * @property string $name
 * @property string $author
 * @property int $kind_id
 * @property int $category_id
 * @property string|null $description
 * @property int $tag_id
 * @property int $link_id
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'kind_id', 'category_id'], 'required'],
            [['kind_id', 'category_id', 'tag_id', 'link_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'author' => 'Автор',
            'kind_id' => 'Тип',
            'category_id' => 'Категория',
            'description' => 'Описание',
            'tag_id' => 'Tag ID',
            'link_id' => 'Link ID',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getKind()
    {
        return $this->hasOne(Kind::className(), ['id' => 'kind_id']);
    }
}
