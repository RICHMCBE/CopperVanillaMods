<?php

namespace refaltor\coppervanillamods\items\armor;

use customiesdevs\customies\item\component\ArmorComponent;
use customiesdevs\customies\item\component\DurabilityComponent;
use customiesdevs\customies\item\component\WearableComponent;
use customiesdevs\customies\item\CreativeInventoryInfo;
use customiesdevs\customies\item\ItemComponents;
use customiesdevs\customies\item\ItemComponentsTrait;
use pocketmine\inventory\ArmorInventory;
use pocketmine\item\Armor;
use pocketmine\item\ArmorTypeInfo;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\VanillaItems;
use pocketmine\utils\TextFormat;

class CopperLeggings extends Armor implements ItemComponents {
    use ItemComponentsTrait;

    public function __construct(ItemIdentifier $identifier)
    {
        $name = 'item.copper:legs';


        $info = new ArmorTypeInfo(
            $this->getDefensePoints(),
            $this->getMaxDurability(),
            ArmorInventory::SLOT_LEGS
        );
        $inventory = new CreativeInventoryInfo(
            CreativeInventoryInfo::CATEGORY_EQUIPMENT,
            CreativeInventoryInfo::GROUP_LEGGINGS,
        );

        parent::__construct($identifier, $name, $info);

        $this->initComponent('copper_legs',$inventory);

        $this->addComponent(new ArmorComponent($this->getDefensePoints(), "diamond"));
        $this->addComponent(new DurabilityComponent($this->getMaxDurability()));
        $this->addComponent(new WearableComponent(WearableComponent::SLOT_ARMOR_LEGS,$this->getDefensePoints()));
    }


    public function getDefensePoints(): int
    {
        return 3;
    }

    public function getMaxDurability(): int
    {
        return 150;
    }
}