<?php

namespace app\models;

use cornernote\linkall\LinkAllBehavior;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

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
    public $tag_ids;

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
            [['tags'], 'safe'],
        ];
    }

    public function behaviors()
    {
        return [
            LinkAllBehavior::className(),
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

    /**
     * @return ActiveQuery
     */
    public function getMaterialTag()
    {
        return $this->hasMany(MaterialTag::className(), ['material_id' => 'id']);
    }

    /**
     * Список тэгов, закреплённых за постом.
     * @var array
     */
    protected $tags = [];

    /**
     * Устанавлиает тэги поста.
     * @param $tagsId
     */
    public function setTags($tagsId)
    {
        $this->tags = (array) $tagsId;
    }

    /**
     * Возвращает массив идентификаторов тэгов.
     */
    public function getTags()
    {
        return ArrayHelper::getColumn(
            $this->getMaterialTag()->all(), 'tag_id'
        );
    }

//    public function getTags()
//    {
//        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
//            ->viaTable('material_tag', ['material_id' => 'id']);
//    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getKind()
    {
        return $this->hasOne(Kind::className(), ['id' => 'kind_id']);
    }

//    public function afterSave($insert, $changedAttributes)
//    {
//        MaterialTag::deleteAll(['material_id' => $this->id]);
//        $tags = [];
//        foreach ($this->tag_ids as $tag_name) {
//            $tags = [$this->id, $tag_name];
//        }
//        self::getDb()->createCommand()
//            ->batchInsert(MaterialTag::tableName(), ['material_id', 'tag_id'], $tags)->execute();
//
//        parent::afterSave($insert, $changedAttributes);
//
//    }
}
