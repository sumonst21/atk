<?php


namespace Sintattica\Atk\Core\Menu;


use Sintattica\Atk\Core\Language;
use Sintattica\Atk\Core\Tools;

/**
 * Class Item
 * Fluent Interface to create a new Item.
 * @package Sintattica\Atk\Core\Menu
 * @author N.Gjata
 */
abstract class Item
{

    public const TOOLTIP_PLACEMENT_TOP = "top";
    public const TOOLTIP_PLACEMENT_BOTTOM = "bottom";
    public const TOOLTIP_PLACEMENT_LEFT = "left";
    public const TOOLTIP_PLACEMENT_RIGHT = "right";

    public const ICON_FA = 'fa';
    public const ICON_IMAGE = 'image';
    public const ICON_CHARS = 'chars';

    protected const DEFAULT_PARENT = "main";
    protected const DEFAULT_ORDER = -1;

    protected $uuid;
    protected $name = "";

    protected $parent = self::DEFAULT_PARENT;
    protected $position = MenuBase::MENU_SIDEBAR;
    protected $enable = 1;
    protected $order = self::DEFAULT_ORDER;
    protected $module = '';
    protected $raw = false;
    protected $urlParams = [];
    protected $tooltip = null;
    protected $tooltipPlacement = self::TOOLTIP_PLACEMENT_BOTTOM;

    private $iconType = self::ICON_FA;
    private $hideName = false;

    //Todo: Pensare come fare per i link esterni!
    protected $icon = null;
    protected $active = false;

    /**
     * Item constructor.
     */
    public function __construct()
    {
    }

    protected abstract function createIdentifierComponents(): ?string;


    public function getIdentifier(): ?string
    {
        if (!$this->uuid) {
            $this->uuid = self::generateHash($this->position . $this->parent . $this->createIdentifierComponents());
        }

        return $this->uuid;
    }

    protected static function generateHash($string, $hashLength = 6)
    {
        $fullHash = md5($string);
        return $hashLength ? substr($fullHash, 0, $hashLength) : $fullHash;
    }

    /**
     * Called only by children as this class is abstract
     * @return string
     */
    public function getType(): string
    {
        try {
            return Tools::getClassName($this);
        } catch (\Exception $e) {
            //NOOP -- this cannot happen!
        }

        return "";
    }


    /**
     * @return string
     */
    public function getParent(): string
    {
        return $this->parent;
    }

    /**
     * @param string $parent
     * @return Item
     */
    public function setParent(string $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Item
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     * @return Item
     */
    public function setPosition(string $position): self
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return int|array|string
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * @param int $enable
     * @return Item
     */
    public function setEnable(int $enable): self
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return Item
     */
    public function setOrder(int $order): self
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return string
     */
    public function getModule(): string
    {
        return $this->module;
    }

    /**
     * @param string $module
     * @return Item
     */
    public function setModule(string $module): self
    {
        $this->module = $module;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRaw(): bool
    {
        return $this->raw;
    }

    /**
     * @param bool $raw
     * @return Item
     */
    public function setRaw(bool $raw): self
    {
        $this->raw = $raw;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     * @param string|null $iconType
     * @return Item
     */
    public function setIcon(?string $icon, ?string $iconType = self::ICON_FA): self
    {

        switch ($iconType) {
            case self::ICON_IMAGE:
                $this->iconType = self::ICON_IMAGE;
                $this->icon = $icon;
                break;
            case self::ICON_CHARS:
                $this->iconType = self::ICON_CHARS;
                $this->icon = substr(Tools::atktext($icon, '', '', Language::getLanguage()), 0, 2);
                break;
            default:
                $this->iconType = self::ICON_FA;
                $this->icon = $icon;
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @param bool $active
     * @return Item
     */
    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @return string
     */
    public function getIconType(): string
    {
        return $this->iconType;
    }

    /**
     * @return bool
     */
    public function isNameHidden(): bool
    {
        return $this->hideName;
    }

    /**
     * @param bool $showItemName
     * @return Item
     */
    public function hideName(bool $showItemName = true): Item
    {
        $this->hideName = $showItemName;
        return $this;
    }

    /**
     * @return string
     */
    public function getTooltip(): ?string
    {
        return $this->tooltip;
    }

    /**
     * @param string $tooltip
     * @return Item
     */
    public function setTooltip(string $tooltip): Item
    {
        $this->tooltip = $tooltip;
        return $this;
    }

    /**
     * @return string
     */
    public function getTooltipPlacement(): string
    {
        return $this->tooltipPlacement;
    }

    /**
     * @param string $tooltipPlacement
     * @return Item
     */
    public function setTooltipPlacement(string $tooltipPlacement): Item
    {
        $this->tooltipPlacement = $tooltipPlacement;
        return $this;
    }




}
