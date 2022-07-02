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
            [['name', 'author', 'kind_id', 'category_id', 'tag_id', 'link_id'], 'required'],
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
            'name' => 'Name',
            'author' => 'Author',
            'kind_id' => 'Kind ID',
            'category_id' => 'Category ID',
            'description' => 'Description',
            'tag_id' => 'Tag ID',
            'link_id' => 'Link ID',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }

    public function getKind()
    {
        return $this->hasOne(Kind::className(), ['id' => 'idKind']);
    }

    public function getLink()
    {
        return $this->hasOne(Link::className(), ['id' => 'idLink']);
    }
}
