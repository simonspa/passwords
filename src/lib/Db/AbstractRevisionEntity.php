<?php
/**
 * This file is part of the Passwords App
 * created by Marius David Wieschollek
 * and licensed under the AGPL.
 */

namespace OCA\Passwords\Db;

/**
 * Class AbstractRevisionEntity
 *
 * @method string getUuid()
 * @method void setUuid(string $uuid)
 * @method string getSseKey()
 * @method void setSseKey(string $sseKey)
 * @method string getSseType()
 * @method void setSseType(string $sseType)
 * @method string getCseType()
 * @method void setCseType(string $cseType)
 * @method string getModel()
 * @method void setModel(string $model)
 * @method string getLabel()
 * @method void setLabel(string $label)
 * @method string getClient()
 * @method void setClient(string $client)
 * @method int getEdited()
 * @method void setEdited(int $edited)
 * @method bool getHidden()
 * @method void setHidden(bool $hidden)
 * @method bool getTrashed()
 * @method void setTrashed(bool $trashed)
 * @method bool getFavorite()
 * @method void setFavorite(bool $favorite)
 * @method bool getFavourite()
 * @method void setFavourite(bool $favourite)
 *
 * @package OCA\Passwords\Db
 */
abstract class AbstractRevisionEntity extends AbstractEntity implements RevisionInterface {

    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $sseKey;

    /**
     * @var string
     */
    protected $sseType;

    /**
     * @var string
     */
    protected $cseType;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $client;

    /**
     * @var int
     */
    protected $edited;

    /**
     * @var bool
     */
    protected $hidden;

    /**
     * @var bool
     */
    protected $trashed;

    /**
     * @var bool
     */
    protected $favorite;

    /**
     * @var bool
     * @deprecated
     */
    protected $favourite;

    /**
     * @var bool
     */
    protected $_decrypted = false;

    /**
     * AbstractRevisionEntity constructor.
     */
    public function __construct() {
        $this->addType('sseType', 'string');
        $this->addType('sseKey', 'string');
        $this->addType('cseType', 'string');

        $this->addType('uuid', 'string');
        $this->addType('model', 'string');
        $this->addType('label', 'string');
        $this->addType('client', 'string');
        $this->addType('edited', 'integer');
        $this->addType('hidden', 'boolean');
        $this->addType('trashed', 'boolean');
        $this->addType('favorite', 'boolean');
        $this->addType('favourite', 'boolean');

        parent::__construct();
    }

    /**
     * @return bool
     */
    public function isTrashed(): bool {
        return $this->getTrashed();
    }

    /**
     * @return bool
     */
    public function isHidden(): bool {
        return $this->getHidden();
    }

    /**
     * @return bool
     */
    public function isFavorite(): bool {
        return $this->getFavorite();
    }

    /**
     * @return bool
     */
    public function _isDecrypted(): bool {
        return $this->_decrypted === true;
    }

    /**
     * @param bool $decrypted
     */
    public function _setDecrypted(bool $decrypted) {
        $this->_decrypted = $decrypted === true;
    }
}