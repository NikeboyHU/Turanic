<?php

/*
 *
 *    _______                    _
 *   |__   __|                  (_)
 *      | |_   _ _ __ __ _ _ __  _  ___
 *      | | | | | '__/ _` | '_ \| |/ __|
 *      | | |_| | | | (_| | | | | | (__
 *      |_|\__,_|_|  \__,_|_| |_|_|\___|
 *
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author TuranicTeam
 * @link https://github.com/TuranicTeam/Turanic
 *
 */

declare(strict_types=1);

namespace pocketmine\level\format;

class EmptySubChunk implements SubChunkInterface{

    public function isEmpty(bool $checkLight = true) : bool{
        return true;
    }

    public function getBlockId(int $x, int $y, int $z) : int{
        return 0;
    }

    public function setBlockId(int $x, int $y, int $z, int $id) : bool{
        return false;
    }

    public function getBlockData(int $x, int $y, int $z) : int{
        return 0;
    }

    public function setBlockData(int $x, int $y, int $z, int $data) : bool{
        return false;
    }

    public function getFullBlock(int $x, int $y, int $z) : int{
        return 0;
    }

    public function setBlock(int $x, int $y, int $z, $id = null, $data = null) : bool{
        return false;
    }

    public function getBlockLight(int $x, int $y, int $z) : int{
        return 0;
    }

    public function setBlockLight(int $x, int $y, int $z, int $level) : bool{
        return false;
    }

    public function getBlockSkyLight(int $x, int $y, int $z) : int{
        return 15;
    }

    public function setBlockSkyLight(int $x, int $y, int $z, int $level) : bool{
        return false;
    }

    public function getHighestBlockAt(int $x, int $z) : int{
        return -1;
    }

    public function getBlockIdColumn(int $x, int $z) : string{
        return "\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00";
    }

    public function getBlockDataColumn(int $x, int $z) : string{
        return "\x00\x00\x00\x00\x00\x00\x00\x00";
    }

    public function getBlockLightColumn(int $x, int $z) : string{
        return "\x00\x00\x00\x00\x00\x00\x00\x00";
    }

    public function getBlockSkyLightColumn(int $x, int $z) : string{
        return "\xff\xff\xff\xff\xff\xff\xff\xff";
    }

    public function getBlockIdArray() : string{
        return str_repeat("\x00", 4096);
    }

    public function getBlockDataArray() : string{
        return str_repeat("\x00", 2048);
    }

    public function getBlockLightArray() : string{
        return str_repeat("\x00", 2048);
    }

    public function setBlockLightArray(string $data){

    }

    public function getBlockSkyLightArray() : string{
        return str_repeat("\xff", 2048);
    }

    public function setBlockSkyLightArray(string $data){

    }

    public function networkSerialize() : string{
        return "\x00" . str_repeat("\x00", 6144);
    }

    public function fastSerialize() : string{
        throw new \BadMethodCallException("Should not try to serialize empty subchunks");
    }
}