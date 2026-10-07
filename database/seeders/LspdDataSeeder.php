<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PenalCode;
use App\Models\Officer;
use App\Models\Rule;
use App\Models\WeaponClass;
use App\Models\RadioCode;
use App\Models\TacticalProcedure;
use App\Models\IncidentCommand;
use App\Models\LegalProcedure;
use App\Models\CourtVerdict;
use App\Models\PromotionQualification;

class LspdDataSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Officers / Chain of Command (286 personnel)
        $officers = [
    [
        'name' => "Daxton Noa",
        'badge_number' => "007",
        'rank' => "Commissioner",
        'division' => "High Command",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Leon Stark",
        'badge_number' => "001",
        'rank' => "Commissioner",
        'division' => "High Command",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Bill Murni",
        'badge_number' => "002",
        'rank' => "Commissioner",
        'division' => "High Command",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Munich Quill",
        'badge_number' => "003",
        'rank' => "Commissioner",
        'division' => "High Command",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Satria Gelassen",
        'badge_number' => "7000",
        'rank' => "Chief of Police",
        'division' => "High Command",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Mocay Gelassen",
        'badge_number' => "7001",
        'rank' => "Assistant Chief of Police",
        'division' => "PATROL OPS",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Michael Wiliams",
        'badge_number' => "7002",
        'rank' => "Assistant Chief of Police",
        'division' => "SPECIAL OPS",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Charlie Clifton",
        'badge_number' => "7003",
        'rank' => "Assistant Chief of Police",
        'division' => "OIB",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Nacho Murphylaw",
        'badge_number' => "7004",
        'rank' => "Assistant Chief of Police",
        'division' => "ASB",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Datuak Chaniago",
        'badge_number' => "7005",
        'rank' => "Assistant Chief of Police",
        'division' => "PSB",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Joni Riverra",
        'badge_number' => "7006",
        'rank' => "Deputy Chief",
        'division' => "PATROL OPS",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7007",
        'rank' => "Deputy Chief",
        'division' => "SPECIAL OPS",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Elang Calix",
        'badge_number' => "7008",
        'rank' => "Deputy Chief",
        'division' => "OIB",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Xylo Boom",
        'badge_number' => "7009",
        'rank' => "Deputy Chief",
        'division' => "ASB",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Takumi Amamiya",
        'badge_number' => "7010",
        'rank' => "Deputy Chief",
        'division' => "PSB",
        'duty_status' => "10-8"
    ],
    [
        'name' => "AlvarezYzn Malaka Villanueva",
        'badge_number' => "7016",
        'rank' => "Commander",
        'division' => "METRO",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Rahayu Arsenia Ambrose",
        'badge_number' => "7017",
        'rank' => "Commander",
        'division' => "Internal Affairs",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kalea Clayton Osvald",
        'badge_number' => "7018",
        'rank' => "Commander",
        'division' => "MCD",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jianyu Zhang",
        'badge_number' => "7019",
        'rank' => "Commander",
        'division' => "Public Affairs",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Aaron Aldrich",
        'badge_number' => "7020",
        'rank' => "Commander",
        'division' => "RED",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jezter Cloud",
        'badge_number' => "7021",
        'rank' => "Commander",
        'division' => "SRT",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Karen Cloud Stark",
        'badge_number' => "7022",
        'rank' => "Commander",
        'division' => "Advocacy & Legal Affairs",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7023",
        'rank' => "Commander",
        'division' => "PATROL OPS",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Karim Herza",
        'badge_number' => "7036",
        'rank' => "Captain",
        'division' => "SWAT",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Tevent Riverra",
        'badge_number' => "7037",
        'rank' => "Captain",
        'division' => "ASD",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Buco Lexano",
        'badge_number' => "7038",
        'rank' => "Captain",
        'division' => "HSIU",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7039",
        'rank' => "Captain",
        'division' => "EOD",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7040",
        'rank' => "Captain",
        'division' => "RED",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7041",
        'rank' => "Captain",
        'division' => "Internal Affairs",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7042",
        'rank' => "Captain",
        'division' => "Public Affairs",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7043",
        'rank' => "Captain",
        'division' => "Advocacy & Legal Affairs",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Broodie Zero Ackeric",
        'badge_number' => "7061",
        'rank' => "Lieutenant",
        'division' => "SWAT",
        'duty_status' => "10-8"
    ],
    [
        'name' => "BONAR NAIHAHAHOHO MH",
        'badge_number' => "7062",
        'rank' => "Lieutenant",
        'division' => "SWAT",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Awan D Cartier",
        'badge_number' => "7063",
        'rank' => "Lieutenant",
        'division' => "SWAT",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Darius Petrov",
        'badge_number' => "7064",
        'rank' => "Lieutenant",
        'division' => "ASD",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7065",
        'rank' => "Lieutenant",
        'division' => "EOD",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Aldof Reyz",
        'badge_number' => "7066",
        'rank' => "Lieutenant",
        'division' => "HSIU",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Axel Mahardika",
        'badge_number' => "7067",
        'rank' => "Lieutenant",
        'division' => "Public Affairs",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "7068",
        'rank' => "Lieutenant",
        'division' => "Internal Affairs",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Kazukii Hayakawa Ambrose",
        'badge_number' => "7069",
        'rank' => "Lieutenant",
        'division' => "RED Recruitment",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Zaper Quinn Villanueva",
        'badge_number' => "7070",
        'rank' => "Lieutenant",
        'division' => "Red Training",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jacob Reed",
        'badge_number' => "74001",
        'rank' => "Captain",
        'division' => "MCD",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "74002",
        'rank' => "Lieutenant",
        'division' => "Head of Homicide",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "74003",
        'rank' => "Lieutenant",
        'division' => "Head of Narcotics",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "74004",
        'rank' => "Lieutenant",
        'division' => "Head of Firearms and Trafficking",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Aziel Arkhana",
        'badge_number' => "74101",
        'rank' => "Detective III",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Ray Citato",
        'badge_number' => "74102",
        'rank' => "Detective III",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Meifanny Lorenta",
        'badge_number' => "74103",
        'rank' => "Detective III",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Fiorella D Cartier",
        'badge_number' => "74104",
        'rank' => "Detective III",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "PaoPao D. Cartier",
        'badge_number' => "74105",
        'rank' => "Detective III",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Putri Luther King",
        'badge_number' => "74201",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Dadang Sungkar",
        'badge_number' => "74202",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Sarah Romanov",
        'badge_number' => "74203",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kimberly Corman",
        'badge_number' => "74204",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Martin Osvald",
        'badge_number' => "74205",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Oliver Queen",
        'badge_number' => "74206",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "James R. Reed",
        'badge_number' => "74207",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Talita Cloud Osvald",
        'badge_number' => "74208",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kante Kusuma",
        'badge_number' => "74209",
        'rank' => "Detective II",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kimberly Biscoff",
        'badge_number' => "74301",
        'rank' => "Detective I",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Fyrdochenkov Miroven",
        'badge_number' => "74302",
        'rank' => "Detective I",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "74303",
        'rank' => "Detective I",
        'division' => "Detective Bureau",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Aca Putri",
        'badge_number' => "74304",
        'rank' => "Detective I",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "74305",
        'rank' => "Detective I",
        'division' => "Detective Bureau",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "74306",
        'rank' => "Detective I",
        'division' => "Detective Bureau",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Meliodas Griezman",
        'badge_number' => "74307",
        'rank' => "Detective I",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Amberly Nadlyne",
        'badge_number' => "74308",
        'rank' => "Detective I",
        'division' => "Detective Bureau",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Steven William",
        'badge_number' => "71001",
        'rank' => "Captain",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Felix Jackson Villanueva",
        'badge_number' => "72001",
        'rank' => "Captain",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Nick Cortez",
        'badge_number' => "71002",
        'rank' => "Lieutenant",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jason Max",
        'badge_number' => "71004",
        'rank' => "Lieutenant",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Dimi Quartaro",
        'badge_number' => "72002",
        'rank' => "Lieutenant",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Benji N Sylvester",
        'badge_number' => "72003",
        'rank' => "Lieutenant",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Gogon Riverra",
        'badge_number' => "71101",
        'rank' => "Sergeant II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "David Off",
        'badge_number' => "71103",
        'rank' => "Sergeant II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Juvelle Biscoff",
        'badge_number' => "71105",
        'rank' => "Sergeant II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kuroshiro Tatsu",
        'badge_number' => "72101",
        'rank' => "Sergeant II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Cody Luc. Seneschal Valonforth",
        'badge_number' => "72102",
        'rank' => "Sergeant II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Novenno B Riverra",
        'badge_number' => "72103",
        'rank' => "Sergeant II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jamaludin Zutherland",
        'badge_number' => "72104",
        'rank' => "Sergeant II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Aldan Y. Malak",
        'badge_number' => "72105",
        'rank' => "Sergeant II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Bilal Einar",
        'badge_number' => "71201",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Reno Arab",
        'badge_number' => "71202",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Liam Alexander Mccartney",
        'badge_number' => "71203",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Bryant W Norgard",
        'badge_number' => "71204",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Saeza Riverra",
        'badge_number' => "71205",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Miko Mizu",
        'badge_number' => "71206",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Valentine Anastacius Barkley",
        'badge_number' => "71207",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Ramon Teramon Amamiya",
        'badge_number' => "71208",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Maximilian Stark",
        'badge_number' => "71209",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Gasendra Jay",
        'badge_number' => "71210",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Daniil Alexandria",
        'badge_number' => "71211",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jun De Constine",
        'badge_number' => "71212",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Joeru Ashford Petrikov",
        'badge_number' => "71213",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Justin Q Villanueva",
        'badge_number' => "71214",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Marcellino Turner",
        'badge_number' => "71215",
        'rank' => "Sergeant I",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Bongkeng Sans",
        'badge_number' => "72201",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72202",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Louie Nathaniel Mccartney",
        'badge_number' => "72203",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Ken Jeder",
        'badge_number' => "72204",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Lucas D. Riverra",
        'badge_number' => "72205",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kenshi Sandria",
        'badge_number' => "72206",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72207",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72208",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72209",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Rehan Gosep",
        'badge_number' => "72210",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72211",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Pyollilo L Cuwtiz",
        'badge_number' => "72212",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Agus Tepar",
        'badge_number' => "72213",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kazuki Hayakawa",
        'badge_number' => "72214",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Gerry L Villanueva",
        'badge_number' => "72215",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Bailey Beneviento",
        'badge_number' => "72216",
        'rank' => "Sergeant I",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Liam Olsen",
        'badge_number' => "71301",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Puyo Amberlyn",
        'badge_number' => "71302",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Junpei Tan",
        'badge_number' => "71303",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Tennq G Mccoy",
        'badge_number' => "71304",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "DJOSUA LAW",
        'badge_number' => "71305",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Erica Akiho Cartier",
        'badge_number' => "71306",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Smokey Blame",
        'badge_number' => "71307",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Daniil Alexandria",
        'badge_number' => "71311",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "KOBAR KORNELLO",
        'badge_number' => "71314",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Ucok Chaniago Jang",
        'badge_number' => "71315",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jovel Ackeric",
        'badge_number' => "71316",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Yuna Mikari",
        'badge_number' => "71317",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Luthan Pandjaitan",
        'badge_number' => "71318",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Anzou Hart",
        'badge_number' => "71319",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Alejandro Defincoco",
        'badge_number' => "71320",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Franky Roronoa",
        'badge_number' => "OFF-9001",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Cokorda Bendod",
        'badge_number' => "71323",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Keshi Reverine",
        'badge_number' => "71324",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Victoria Berlin Valencaera",
        'badge_number' => "71325",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Billy Teker",
        'badge_number' => "71327",
        'rank' => "Police Officer III",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jhon Kaonak",
        'badge_number' => "72301",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Sza Clementine Murphylaw",
        'badge_number' => "72302",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Agera Ger",
        'badge_number' => "72303",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Mikhail Morozov",
        'badge_number' => "72304",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Abeyya Sandria",
        'badge_number' => "72305",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Rafael Riverra",
        'badge_number' => "72306",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Alexander Campbell",
        'badge_number' => "72307",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Zaasun Stark Villanueva",
        'badge_number' => "72308",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Abdul Fawaz",
        'badge_number' => "72309",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Antonio Del Ucup",
        'badge_number' => "72311",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kaze Hytam",
        'badge_number' => "72313",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jacody Hampton",
        'badge_number' => "72314",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "De Mario Garcia",
        'badge_number' => "72315",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Aoki Nanda",
        'badge_number' => "72316",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Severus Edward Graves",
        'badge_number' => "72317",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "James Serioza",
        'badge_number' => "72319",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Lunazeline B. Stark",
        'badge_number' => "72322",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Andrew Mikhailovich Sirohe",
        'badge_number' => "72324",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Yuki Hayakawa",
        'badge_number' => "72325",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Callyster Amadeuus DHM",
        'badge_number' => "72326",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Zoey Cassander",
        'badge_number' => "72329",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kim Ashiro Miyamura",
        'badge_number' => "72330",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Yoseph Beyezid",
        'badge_number' => "72331",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Celcius A Riverra",
        'badge_number' => "72332",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "James Rodriguez",
        'badge_number' => "72333",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Arthur William",
        'badge_number' => "72334",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Yosafat Christian Dharma",
        'badge_number' => "72335",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Nadaraya Historia",
        'badge_number' => "72337",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Leon Redfield",
        'badge_number' => "72338",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Sainz Lando",
        'badge_number' => "72339",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72310",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72312",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72318",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72320",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72321",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72323",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72327",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72328",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72336",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72340",
        'rank' => "Police Officer III",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Kaito Nash",
        'badge_number' => "71401",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Zha Bree",
        'badge_number' => "71402",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Alexis Rasen",
        'badge_number' => "71403",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Gegey Alvarez",
        'badge_number' => "71404",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Hayate Jayendra",
        'badge_number' => "71405",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kris Wu",
        'badge_number' => "71406",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Nakai San",
        'badge_number' => "71407",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Alexander Gatot",
        'badge_number' => "71408",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Niko Fertores",
        'badge_number' => "71409",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Levi Audemars",
        'badge_number' => "71410",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Chen Yu",
        'badge_number' => "71411",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Dinda C Riverra",
        'badge_number' => "71412",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "AHORRI DJAHOEFFMANN",
        'badge_number' => "71413",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Rafless Diyandra",
        'badge_number' => "71414",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Alex Morel",
        'badge_number' => "71415",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kello Osvald",
        'badge_number' => "71416",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Santos DS",
        'badge_number' => "71418",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Zee Lons",
        'badge_number' => "71425",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Rio Frank",
        'badge_number' => "71428",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jovel Ackeric",
        'badge_number' => "71433",
        'rank' => "Police Officer II",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "EL Capitao",
        'badge_number' => "72401",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Zoey D Bweok",
        'badge_number' => "72402",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Amar Giovanni Villanueva",
        'badge_number' => "72403",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kevin Shirakaze",
        'badge_number' => "72404",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Librae G Riley",
        'badge_number' => "72405",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Darry A Logan",
        'badge_number' => "72406",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Em Castelo",
        'badge_number' => "72407",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Justin De Cartville",
        'badge_number' => "72408",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Levi Akuma",
        'badge_number' => "72409",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Alejandro Delpino",
        'badge_number' => "72410",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "John Winstonfield",
        'badge_number' => "72411",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Abiz Rivera",
        'badge_number' => "72412",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Argie Windra",
        'badge_number' => "72413",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Ucup Meletup",
        'badge_number' => "72414",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kevin Lolong",
        'badge_number' => "72415",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kuro Ezra",
        'badge_number' => "72416",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Nero Leonard",
        'badge_number' => "72417",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Anna Adriana Valonforth",
        'badge_number' => "72420",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "El Capitano",
        'badge_number' => "72421",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Aidan Strange",
        'badge_number' => "72422",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Bejo Kesandung",
        'badge_number' => "72426",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Thomas Riverra",
        'badge_number' => "72438",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Benedetta Stark",
        'badge_number' => "72440",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72418",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72419",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72423",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72424",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72425",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72427",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72428",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72429",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72430",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72431",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72432",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72433",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72434",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72435",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72436",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72437",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72439",
        'rank' => "Police Officer II",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "Farrel Horeg",
        'badge_number' => "71501",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Graciella Hwang",
        'badge_number' => "71502",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Ary Luckmad",
        'badge_number' => "71504",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Alex Morgan",
        'badge_number' => "71506",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jar Kocoys",
        'badge_number' => "71507",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Mansyur Sikampang",
        'badge_number' => "71508",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Aditya Cakra Lesmana",
        'badge_number' => "71509",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Fernandes Bill",
        'badge_number' => "71511",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "OSCAR W STANLEY",
        'badge_number' => "71512",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Liam Supail",
        'badge_number' => "71513",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Shiva De Katriel",
        'badge_number' => "71514",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Gren O Melver",
        'badge_number' => "71515",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Doye Irving",
        'badge_number' => "71516",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Ley Alexander",
        'badge_number' => "71518",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Santos DS",
        'badge_number' => "71519",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Velisse Kazumi L",
        'badge_number' => "71521",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Rayncii Ishikawa",
        'badge_number' => "71522",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "William Turner",
        'badge_number' => "71523",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Verlin D Icarus",
        'badge_number' => "71524",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Richard D. Cartier",
        'badge_number' => "71525",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Mina Sharon",
        'badge_number' => "71526",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Victor Cartesius",
        'badge_number' => "71527",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "David Zijlstra",
        'badge_number' => "71528",
        'rank' => "Rookie",
        'division' => "Station 71",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Lamelo Tenjin",
        'badge_number' => "72502",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Udin Ras'Ud",
        'badge_number' => "72504",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Vin Ezra",
        'badge_number' => "72505",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Logan Fukushima",
        'badge_number' => "72506",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Aika Amamiya",
        'badge_number' => "72507",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Ishihara Diby Andrea",
        'badge_number' => "72508",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Rhyn Orine",
        'badge_number' => "72509",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Vinz M Riverra",
        'badge_number' => "72510",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Kurniadi Misbulah",
        'badge_number' => "72511",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jeremiah Navarro",
        'badge_number' => "72512",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Steve City",
        'badge_number' => "72513",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Mateo Herrera",
        'badge_number' => "72514",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "UJANG WIFI",
        'badge_number' => "72515",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Richie Miga",
        'badge_number' => "72516",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Allan Antoni",
        'badge_number' => "72517",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Jihan Tron",
        'badge_number' => "72518",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Reinessence Lysea",
        'badge_number' => "72519",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Alexander Luice",
        'badge_number' => "72520",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Sakra Vanhouten",
        'badge_number' => "72521",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Mamat Rambo",
        'badge_number' => "72522",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Erza Radhiant",
        'badge_number' => "72523",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Bella Beatrice",
        'badge_number' => "72524",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Rei X Leonora",
        'badge_number' => "72527",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Simon Ghost Riley",
        'badge_number' => "72529",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "Zoey Rogers",
        'badge_number' => "72530",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-8"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72501",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72503",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72525",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72526",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72528",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ],
    [
        'name' => "VACANT",
        'badge_number' => "72531",
        'rank' => "Rookie",
        'division' => "Station 72",
        'duty_status' => "10-7"
    ]
];

        foreach ($officers as $off) {
            Officer::create($off);
        }

        // 2. All 241 Penal Codes
        $penalCodes = [
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)01",
        'title' => "TREASON (COURT VERDICT/DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pengkhianatan terhadap negara/pemerintah San Andreas, perang melawan negara, atau membantu musuh. Dihukum lewat Court Verdict atau Hukuman Mati."
    ],
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)02",
        'title' => "SEDITION (COURT VERDICT/DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penghasutan atau menghimpun gerakan untuk menggulingkan atau merusak kekuasaan sah negara."
    ],
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)03",
        'title' => "REBELLION AND INSURRECTION (COURT VERDICT/DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pemberontakan bersenjata atau perlawanan terorganisir melawan pemerintah sah."
    ],
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)04",
        'title' => "SABOTAGE OF STATE FUNCTIONS (COURT VERDICT/DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Sabotase fasilitas, infrastruktur kritis, atau jaringan komunikasi resmi milik negara."
    ],
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)05",
        'title' => "UNLAWFUL IMPERSONATION OF STATE AUTHORITY (COURT VERDICT/DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penyamaran sebagai otoritas resmi negara/penegak hukum untuk tujuan kejahatan skala nasional."
    ],
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)06",
        'title' => "ESPIONAGE (COURT VERDICT/DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Spionase atau pembocoran dokumen dan rahasia pertahanan negara kepada musuh/organisasi ilegal."
    ],
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)07",
        'title' => "TERRORISM (COURT VERDICT/DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Tindak terorisme yang mengancam keselamatan nyawa publik, fasilitas vital, atau stabilitas negara."
    ],
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)08",
        'title' => "DOMESTIC TERRORISM (COURT VERDICT/DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Terorisme domestik/lokal yang menargetkan populasi sipil dan institusi pemerintah."
    ],
    [
        'category' => "STATE OFFENSES (PASAL 0)",
        'code' => "(0)09",
        'title' => "COMPLICITY OF STATE ENEMIES",
        'fine' => 350000,
        'jail_time' => 90,
        'type' => "Felony",
        'description' => "Memberi bantuan logistik, perlindungan, tempat tinggal, atau intelijen kepada musuh negara."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)01",
        'title' => "CRIMINAL THREATS",
        'fine' => 6000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Setiap orang yang secara sengaja mengancam akan melakukan tindak kejahatan kekerasan dengan maksud menimbulkan rasa takut yang wajar atas keselamatan orang lain."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)02",
        'title' => "ASSAULT",
        'fine' => 6500,
        'jail_time' => 12,
        'type' => "Felony",
        'description' => "Setiap orang yang secara melawan hukum mengancam atau mencoba menggunakan kekuatan fisik terhadap orang lain tanpa sentuhan fisik langsung."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)03",
        'title' => "ASSAULT ON A GOVERNMENT EMPLOYEE",
        'fine' => 35000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Setiap orang yang melakukan pengancaman atau penyerangan terhadap pegawai/petugas pemerintah yang sedang bertugas."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)04",
        'title' => "ASSAULT WITH DEADLY WEAPON",
        'fine' => 28000,
        'jail_time' => 22,
        'type' => "Felony",
        'description' => "Penyerangan menggunakan senjata api, pisau, atau senjata berbahaya lain yang berpotensi menyebabkan luka fisik parah atau kematian."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)05",
        'title' => "ASSAULT WITH DEADLY WEAPON ON A GOVERNMENT EMPLOYEE",
        'fine' => 43500,
        'jail_time' => 35,
        'type' => "Felony",
        'description' => "Penyerangan menggunakan senjata mematikan terhadap pegawai atau petugas pemerintah yang sedang bertugas."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)06",
        'title' => "DOMESTIC VIOLENCE",
        'fine' => 32000,
        'jail_time' => 50,
        'type' => "Felony",
        'description' => "Tindak kekerasan fisik atau penganiayaan terhadap pasangan, anggota keluarga, atau rekan se-rumah."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)07",
        'title' => "BATTERY",
        'fine' => 35000,
        'jail_time' => 16,
        'type' => "Felony",
        'description' => "Kontak fisik secara sengaja dan melawan hukum yang bersifat ofensif atau menyebabkan cedera ringan pada orang lain."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)08",
        'title' => "BATTERY ON A GOVERNMENT EMPLOYEE",
        'fine' => 65000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Kontak fisik secara sengaja dan melawan hukum terhadap pegawai/petugas pemerintah yang sedang bertugas."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)09",
        'title' => "AGGRAVATED BATTERY",
        'fine' => 50000,
        'jail_time' => 35,
        'type' => "Felony",
        'description' => "Penganiayaan berat yang mengakibatkan cedera fisik serius, luka permanen, atau melibatkan penggunaan senjata mematikan."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)10",
        'title' => "GANG RELATED SHOOTING",
        'fine' => 30000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Penembakan senjata api terhadap orang lain, kendaraan berpenumpang, atau tempat tinggal terkait aktivitas geng."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)11",
        'title' => "ATTEMPTED SECOND DEGREE MURDER",
        'fine' => 59000,
        'jail_time' => 45,
        'type' => "Felony",
        'description' => "Percobaan pembunuhan tanpa perencanaan terlebih dahulu, tetapi dilakukan dengan niat sengaja dan niat jahat."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)12",
        'title' => "ATTEMPTED FIRST DEGREE MURDER",
        'fine' => 85000,
        'jail_time' => 60,
        'type' => "Felony",
        'description' => "Percobaan pembunuhan berencana dengan niat sengaja terhadap orang lain."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)13",
        'title' => "ATTEMPTED MURDER OF GOVERNMENT EMPLOYEE",
        'fine' => 160000,
        'jail_time' => 80,
        'type' => "Felony",
        'description' => "Percobaan pembunuhan terhadap pegawai atau petugas pemerintah yang sedang melaksanakan tugas hukum yang sah."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)14",
        'title' => "THIRD DEGREE MURDER",
        'fine' => 180000,
        'jail_time' => 150,
        'type' => "Felony",
        'description' => "Pembunuhan yang disebabkan oleh kelalaian atau pengabaian ekstrem terhadap keselamatan nyawa manusia."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)15",
        'title' => "SECOND DEGREE MURDER",
        'fine' => 200000,
        'jail_time' => 470,
        'type' => "Felony",
        'description' => "Pembunuhan tanpa perencanaan terlebih dahulu, tetapi dilakukan secara sengaja dengan niat jahat."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)16",
        'title' => "FIRST DEGREE MURDER (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pembunuhan berencana dengan niat sengaja. Dikenakan sanksi vonis pengadilan (Court Verdict) atau hukuman mati."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)18",
        'title' => "MURDER OF A GOVERNMENT EMPLOYEE (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pembunuhan terhadap pegawai/petugas pemerintah yang sedang bertugas. Dihukum melalui Court Verdict atau hukuman mati."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)18-27",
        'title' => "SERIAL HOMICIDE (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pembunuhan berantai terhadap dua orang atau lebih dalam insiden terpisah. Dihukum melalui Court Verdict atau hukuman mati."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)19",
        'title' => "MAYHEM",
        'fine' => 60000,
        'jail_time' => 85,
        'type' => "Felony",
        'description' => "Melukai, mencacatkan, atau merusak anggota tubuh orang lain secara permanen dan berbahaya secara melawan hukum."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)20",
        'title' => "AGGRAVATED MAYHEM (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penganiayaan berat berencana yang menyebabkan cacat permanen atau kelumpuhan pada orang lain."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)21",
        'title' => "TORTURE (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Menyiksa orang lain secara fisik dengan kesakitan ekstrem untuk tujuan hukuman, paksaan, atau kepuasan sadis."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)22",
        'title' => "UNLAWFUL IMPRISONMENT",
        'fine' => 3500,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Menahan atau mengurung orang lain secara tidak sah tanpa wewenang hukum."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)23",
        'title' => "UNLAWFUL DETENTION",
        'fine' => 20000,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Menahan atau membatasi pergerakan orang lain secara paksa atau ancaman tanpa wewenang hukum."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)24",
        'title' => "HOSTAGES",
        'fine' => 3000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Menahan 1 atau 2 orang sebagai sandera dengan maksud memaksa keputusan atau tindakan pihak pemerintah."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)25",
        'title' => "AGGRAVATED HOSTAGES",
        'fine' => 20000,
        'jail_time' => 35,
        'type' => "Felony",
        'description' => "Menahan 3 orang atau lebih sebagai sandera untuk pemaksaan atau menghindari penangkapan."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)26",
        'title' => "HOSTAGE TAKING OF GOVERNMENT EMPLOYEES CATEGORY 1 (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penyanderaan pejabat/petugas pemerintah Kategori 1 untuk mempengaruhi wewenang konstitusional."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)27",
        'title' => "HOSTAGE TAKING OF GOVERNMENT EMPLOYEES CATEGORY 2",
        'fine' => 120000,
        'jail_time' => 100,
        'type' => "Felony",
        'description' => "Penyanderaan pejabat/petugas pemerintah Kategori 2 untuk pemaksaan atau menghalangi tugas pemerintahan."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)28",
        'title' => "HOSTAGE TAKING OF GOVERNMENT EMPLOYEES CATEGORY 3",
        'fine' => 100000,
        'jail_time' => 80,
        'type' => "Felony",
        'description' => "Penyanderaan pejabat/petugas pemerintah Kategori 3 yang sedang menjalankan tugas sah."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)29",
        'title' => "AGGRAVATED HOSTAGE TAKING OF GOVERNMENT EMPLOYEES (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penyanderaan berat terhadap beberapa petugas/pejabat pemerintah dengan ancaman kekuatan mematikan atau luka serius."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)30",
        'title' => "KIDNAPPING",
        'fine' => 15000,
        'jail_time' => 14,
        'type' => "Felony",
        'description' => "Penculikan, penyekapan, atau membawa kabur orang lain secara paksa tanpa izin dan wewenang hukum."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)31",
        'title' => "KIDNAPPING OF A GOVERNMENT EMPLOYEES",
        'fine' => 45000,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Penculikan terhadap pegawai atau petugas pemerintah yang sedang menjalankan tugas resmi."
    ],
    [
        'category' => "AGAINST PERSON (PASAL 1)",
        'code' => "(1)32",
        'title' => "AGGRAVATED BATTERY TO GOVERNMENT EMPLOYEE",
        'fine' => 90000,
        'jail_time' => 45,
        'type' => "Felony",
        'description' => "Penganiayaan berat terhadap petugas pemerintah yang mengakibatkan luka fisik serius, cacat permanen, atau melibatkan senjata mematikan."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.01 LEAVING WITHOUT PAYING",
        'title' => "3.01 LEAVING WITHOUT PAYING",
        'fine' => 300,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Membeli barang atau jasa dari toko/tempat usaha lalu pergi secara sengaja tanpa membayar."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.02 PETTY THEFT",
        'title' => "3.02 PETTY THEFT",
        'fine' => 5000,
        'jail_time' => 7,
        'type' => "Felony",
        'description' => "Pencurian properti milik orang lain dalam nilai kecil di bawah batas ambang hukum."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.03 GRAND THEFT",
        'title' => "3.03 GRAND THEFT",
        'fine' => 8000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Pencurian properti bernilai tinggi milik orang lain melebihi batas ambang hukum."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.04 JOYRIDING",
        'title' => "3.04 JOYRIDING",
        'fine' => 2500,
        'jail_time' => 7,
        'type' => "Misdemeanor",
        'description' => "Mengendarai kendaraan milik orang lain tanpa izin pemilik, namun tanpa niat mencuri permanen."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.05 GRAND THEFT AUTO",
        'title' => "3.05 GRAND THEFT AUTO",
        'fine' => 1500,
        'jail_time' => 12,
        'type' => "Misdemeanor",
        'description' => "Mencuri kendaraan bermotor milik orang lain secara melawan hukum."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.06 GRAND THEFT OF FIREARM",
        'title' => "3.06 GRAND THEFT OF FIREARM",
        'fine' => 25000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Mencuri senjata api milik orang lain secara melawan hukum."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.07 TAMPERING WITH VEHICLE",
        'title' => "3.07 TAMPERING WITH VEHICLE",
        'fine' => 3000,
        'jail_time' => 5,
        'type' => "Felony",
        'description' => "Membongkar, merusak, atau mengganggu fungsi kendaraan tanpa izin pemilik."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.08 COMMERCIAL ROBBERY ( LTD ROBBERY )",
        'title' => "3.08 COMMERCIAL ROBBERY ( LTD ROBBERY )",
        'fine' => 7000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Perampokan toko komersial (seperti minimarket 24/7 atau LTD) secara paksa."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.10 POSSESSION OF STOLEN GOODS",
        'title' => "3.10 POSSESSION OF STOLEN GOODS",
        'fine' => 3500,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Memiliki atau menguasai properti yang diketahui merupakan barang hasil curian."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.11 POSSESSION OF A STOLEN IDENTIFICATION",
        'title' => "3.11 POSSESSION OF A STOLEN IDENTIFICATION",
        'fine' => 7000,
        'jail_time' => 5,
        'type' => "Felony",
        'description' => "Memiliki dokumen identitas resmi negara milik orang lain yang dicuri."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.12 GRAND LARCENY FEDERAL BANKS ( PACIFIC BANK ROBBERY, COUNTY AND MAZE BANK )",
        'title' => "3.12 GRAND LARCENY FEDERAL BANKS ( PACIFIC BANK ROBBERY, COUNTY AND MAZE BANK )",
        'fine' => 20000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Perampokan bank besar/federal terorganisir (Pacific Bank, Maze Bank, Blaine County Bank)."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.13 GRAND LARCENY PUBLIC BANK ( FLEECA )",
        'title' => "3.13 GRAND LARCENY PUBLIC BANK ( FLEECA )",
        'fine' => 10000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Perampokan bank umum/Fleeca Bank secara paksa."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.14 GRAND LARCENY MAJOR PROPERTY",
        'title' => "3.14 GRAND LARCENY MAJOR PROPERTY",
        'fine' => 10000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Perampokan fasilitas properti utama (seperti Bobcat, Laundromat, Gruppe Sechs, Cash Exchange)."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.15 THEFT OF AN AIRCRAFT",
        'title' => "3.15 THEFT OF AN AIRCRAFT",
        'fine' => 8000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Pencurian atau membawa kabur kendaraan udara/pesawat tanpa izin pemilik."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.17 BURGLARY",
        'title' => "3.17 BURGLARY",
        'fine' => 8000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Memasuki bangunan rumah/properti orang lain secara tidak sah untuk melakukan pencurian."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.18 TRESPASSING",
        'title' => "3.18 TRESPASSING",
        'fine' => 1500,
        'jail_time' => 5,
        'type' => "Misdemeanor",
        'description' => "Memasuki atau berada di properti milik orang lain tanpa izin atau hak sah."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "(3)19",
        'title' => "FELONY TRESPASSING",
        'fine' => 90000,
        'jail_time' => 45,
        'type' => "Felony",
        'description' => "Memasuki properti terlarang/vital (seperti fasilitas militer/listrik) untuk kejahatan felony."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "(3)20",
        'title' => "TRESPASSING OF A MILITARY FACILITY",
        'fine' => 100000,
        'jail_time' => 50,
        'type' => "Felony",
        'description' => "Memasuki pangkalan militer atau zona pertahanan terlarang tanpa wewenang hukum."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.21 ARSON",
        'title' => "3.21 ARSON",
        'fine' => 90000,
        'jail_time' => 35,
        'type' => "Felony",
        'description' => "Membakar atau memicu kebakaran pada bangunan, lahan, atau properti secara sengaja."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "(3)22",
        'title' => "DESTRUCTION OF GOVERNMENT PROPERTY",
        'fine' => 156250,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Merusak, menghancurkan, atau membuat cacat properti/fasilitas milik pemerintah secara sengaja."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.23 ENTERTAINMENT PROPERTY TAKING ( CASINO ROBBERY )",
        'title' => "3.23 ENTERTAINMENT PROPERTY TAKING ( CASINO ROBBERY )",
        'fine' => 15000,
        'jail_time' => 60,
        'type' => "Felony",
        'description' => "Perampokan uang/benda berharga dari fasilitas hiburan atau kasino secara terorganisir."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.24 CULTURAL MUSEUM PROPERTY TAKING ( ART ASYLUM ROBBERY )",
        'title' => "3.24 CULTURAL MUSEUM PROPERTY TAKING ( ART ASYLUM ROBBERY )",
        'fine' => 15000,
        'jail_time' => 60,
        'type' => "Felony",
        'description' => "Perampokan barang bernilai sejarah/seni dari museum budaya atau galeri seni."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "(3)25",
        'title' => "GOVERNMENT PROPERTY TAKING",
        'fine' => 55250,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Mengambil, menguasai, atau merampas kendaraan/peralatan milik dinas pemerintah secara tidak sah."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "3.26 ROBBERY OF VANGELICO PROPERTY",
        'title' => "3.26 ROBBERY OF VANGELICO PROPERTY",
        'fine' => 12000,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Perampokan perhiasan atau emas berharga dari toko Vangelico secara paksa."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "(3)27",
        'title' => "ACCESSORY TO ROBBERY",
        'fine' => 3000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Membantu atau memfasilitasi tindak perampokan (sebagai pengintai, supir kabur, atau tempat bersembunyi)."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "(3)28",
        'title' => "ATM ROBBERY",
        'fine' => 1700,
        'jail_time' => 15,
        'type' => "Misdemeanor",
        'description' => "Mencoba atau merusak dan merampok uang tunai dari mesin ATM secara tidak sah."
    ],
    [
        'category' => "PROPERTY OFFENSES (PASAL 3)",
        'code' => "(3)30",
        'title' => "VANDALISM ON GOVERNMENT PROPERTY",
        'fine' => 9000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Mencoret, merusak, atau membuat kerusakan fisik pada properti milik pemerintah."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)01",
        'title' => "FORGERY",
        'fine' => 6500,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Pemalsuan, pengubahan, atau pembuatan dokumen palsu dengan niat menipu."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)02",
        'title' => "STATE DOCUMENT FORGERY",
        'fine' => 15250,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Pemalsuan dokumen resmi negara seperti KTP/ID, SIM (license), atau izin resmi negara."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)03",
        'title' => "VEHICLE REGISTRATION FRAUD",
        'fine' => 10000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Pemalsuan atau penggunaan plat nomor, surat kendaraan, atau dokumen registrasi kendaraan palsu."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)04",
        'title' => "FRAUD",
        'fine' => 8000,
        'jail_time' => 12,
        'type' => "Felony",
        'description' => "Penipuan secara sengaja terhadap orang lain untuk keuntungan pribadi atau merugikan pihak lain."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)05",
        'title' => "VOTER FRAUD (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pemalsuan pemilu atau manipulasi suara pemilu secara tidak sah."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)06",
        'title' => "RACKETEERING",
        'fine' => 13000,
        'jail_time' => 60,
        'type' => "Felony",
        'description' => "Menjalankan bisnis ilegal terorganisir atau kejahatan terencana untuk keuntungan finansial."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)07",
        'title' => "EXTORTION",
        'fine' => 10000,
        'jail_time' => 40,
        'type' => "Felony",
        'description' => "Pemerasan atau pemaksaan secara tidak sah untuk memperoleh uang atau properti dari orang lain."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)08",
        'title' => "MONEY LAUNDERING (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pencucian uang hasil tindak kejahatan untuk menyembunyikan asal usul dana ilegal."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)09",
        'title' => "FIRST DEGREE POSSESSION OF ILLEGAL MONEY (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Kepemilikan uang ilegal melebihi $400,000 dari hasil kejahatan (narkoba, pencucian uang, dll)."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)10",
        'title' => "IMPERSONATION",
        'fine' => 2000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Penyamaran atau berpura-pura menjadi orang lain untuk menipu atau menyesatkan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)11",
        'title' => "IDENTITY THEFT",
        'fine' => 6000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Pencurian identitas orang lain secara melawan hukum untuk tujuan penipuan atau kejahatan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)12",
        'title' => "IMPERSONATING GOVERNMENT EMPLOYEE",
        'fine' => 50000,
        'jail_time' => 35,
        'type' => "Felony",
        'description' => "Berpura-pura menjadi pegawai/petugas pemerintah dengan maksud menipu atau menyesatkan publik."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)13",
        'title' => "EMBEZZLEMENT",
        'fine' => 10500,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Penggelapan uang atau properti yang dipercayakan untuk penggunaan pribadi."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)14",
        'title' => "CONSPIRACY (COURT VERDICT / DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Persekongkolan atau kesepakatan dengan orang lain untuk melakukan tindak kejahatan berat."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)15",
        'title' => "BRIBERY",
        'fine' => 100000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Suap atau memberi/menerima sesuatu berharga untuk mempengaruhi keputusan pejabat publik."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)16",
        'title' => "PERJURY (JUDGE DECISION)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Kesaksian palsu di bawah sumpah dalam persidangan resmi."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)17",
        'title' => "A EVIDENCE TAMPERING",
        'fine' => 30000,
        'jail_time' => 60,
        'type' => "Felony",
        'description' => "Perusakan, pengubahan, atau penyembunyian barang bukti tindak kejahatan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)17-86",
        'title' => "B EVIDENCE TAMPERING (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Perusakan barang bukti dalam kasus kejahatan berat (diadili lewat Court Verdict)."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)18",
        'title' => "WITNESS TAMPERING (JUDGE DECISION)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Pengancaman, pemaksaan, atau suap terhadap saksi agar berbohong atau tidak bersaksi."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)19",
        'title' => "INTIMIDATING A WITNESS OR VICTIM (JUDGE DECISION)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Intimidasi atau pengancaman terhadap saksi atau korban kejahatan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)20",
        'title' => "OBSTRUCTION OF PUBLIC DUTY",
        'fine' => 12000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Menghalangi atau mengganggu petugas pemerintah yang sedang menjalankan tugas sah."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)21",
        'title' => "OBSTRUCTION OF JUSTICE",
        'fine' => 50000,
        'jail_time' => 70,
        'type' => "Felony",
        'description' => "Menghalangi proses hukum, penyidikan polisi, atau persidangan pengadilan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)22",
        'title' => "MISUSE OF EMERGENCY HOTLINE",
        'fine' => 500,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Penyalahgunaan nomor telepon darurat (911) untuk tujuan non-darurat."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)23",
        'title' => "MAKING A FALSE REPORT OF AN EMERGENCY",
        'fine' => 800,
        'jail_time' => 15,
        'type' => "Misdemeanor",
        'description' => "Membuat laporan palsu tentang situasi darurat yang memicu respon petugas."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)24",
        'title' => "FAILURE TO PAY A FINE",
        'fine' => 2500,
        'jail_time' => 15,
        'type' => "Misdemeanor",
        'description' => "Menolak atau sengaja tidak membayar denda sah yang telah ditetapkan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)25",
        'title' => "FAILURE TO IDENTIFY TO A PEACE OFFICER",
        'fine' => 2000,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Menolak memberikan identitas yang sah saat diamankan oleh petugas."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)26",
        'title' => "MISDEMEANOR TAX EVASION (JUDGE DECISION)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Penghindaran pajak skala ringan di bawah batas felony."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)27",
        'title' => "FELONY TAX EVASION (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penghindaran pajak skala besar melebihi batas felony."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)28",
        'title' => "GAMBLING LICENSE VIOLATION",
        'fine' => 0,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Penyelenggaraan atau partisipasi dalam perjudian tanpa izin lisensi sah."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)29",
        'title' => "CRIMINAL BUSINESS OPERATIONS",
        'fine' => 5000,
        'jail_time' => 150,
        'type' => "Felony",
        'description' => "Pengoperasian bisnis untuk tujuan kejahatan atau kedok bisnis ilegal."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)30",
        'title' => "LEGAL PRACTICE VIOLATION (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Menjalankan praktik hukum tanpa lisensi atau izin resmi sah."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)31",
        'title' => "MEDICAL PRACTICE VIOLATION (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Menjalankan praktik kedokteran tanpa izin resmi sah."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)32",
        'title' => "SECOND DEGREE POSSESSION OF ILLEGAL MONEY",
        'fine' => 80000,
        'jail_time' => 70,
        'type' => "Felony",
        'description' => "Kepemilikan uang ilegal melebihi $150,000 dari hasil tindak kejahatan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)33",
        'title' => "THIRD DEGREE POSSESSION OF ILLEGAL MONEY",
        'fine' => 35000,
        'jail_time' => 50,
        'type' => "Felony",
        'description' => "Kepemilikan uang ilegal di bawah $149,999 dari hasil tindak kejahatan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)34",
        'title' => "UNLAWFUL POSSESSION OF STATE INSIGNIA",
        'fine' => 32000,
        'jail_time' => 12,
        'type' => "Felony",
        'description' => "Kepemilikan atau penggunaan atribut/lencana resmi negara secara tidak sah."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)35",
        'title' => "MINOR POSSESSION OF ILLEGAL MONEY",
        'fine' => 15000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Kepemilikan uang ilegal di bawah $50,000 dari hasil kejahatan."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)36",
        'title' => "THIRD DEGREE POSSESSION OF ILLEGAL LAUNDRY CARD",
        'fine' => 30000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Kepemilikan kartu laundry/uang ilegal sebanyak 10 kartu atau kurang."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)37",
        'title' => "SECOND DEGREE POSSESSION OF ILLEGAL LAUNDRY CARDS",
        'fine' => 60000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Kepemilikan kartu laundry/uang ilegal sebanyak 39 kartu atau kurang."
    ],
    [
        'category' => "PUBLIC ADMIN (PASAL 4)",
        'code' => "(4)38",
        'title' => "FIRST DEGREE POSSESSION OF ILLEGAL LAUNDRY CARDS (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Kepemilikan kartu laundry/uang ilegal melebihi 40 kartu."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)01",
        'title' => "LOITERING",
        'fine' => 50,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Nongkrong/berada di tempat umum tanpa tujuan jelas setelah diperingatkan petugas."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)02",
        'title' => "UNLAWFUL ASSEMBLY",
        'fine' => 10000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Berkumpulnya 3 orang atau lebih dengan niat melakukan kejahatan atau mengganggu ketertiban umum."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)03",
        'title' => "INCITEMENT TO RIOT",
        'fine' => 17000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Penghasutan atau memprovokasi kerusuhan masal dan kekerasan publik."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)04",
        'title' => "OBSTRUCTION OF GOVERNMENT EMPLOYEE",
        'fine' => 1500,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Menghalangi atau mengganggu petugas pemerintah yang sedang bertugas."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)05",
        'title' => "DISOBEYING A PEACE OFFICER",
        'fine' => 2500,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Menolak mematuhi perintah atau arahan sah dari petugas kepolisian."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)06",
        'title' => "EVADING A PEACE OFFICER",
        'fine' => 2500,
        'jail_time' => 8,
        'type' => "Misdemeanor",
        'description' => "Kabur dari kejaran petugas kepolisian saat hendak diamankan."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)07",
        'title' => "RESISTING ARREST",
        'fine' => 1500,
        'jail_time' => 5,
        'type' => "Misdemeanor",
        'description' => "Melawan, menolak diborgol, atau berusaha kabur saat hendak ditangkap petugas."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)08",
        'title' => "ESCAPING CUSTODY",
        'fine' => 30000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Kabur dari penahanan, mobil polisi, atau tempat pemeriksaan hukum."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)09",
        'title' => "DISTURBING THE PEACE",
        'fine' => 8000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Mengganggu ketenangan publik (keributan, musik terlalu keras, perkelahian)."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)10",
        'title' => "FAILURE TO APPEAR (JUDGE DECISION)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mangkir atau tidak hadir dalam panggilan persidangan pengadilan resmi."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)11",
        'title' => "SUBPOENA VIOLATION (JUDGE DECISION)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengabaikan atau melanggar surat panggilan (subpoena) resmi pengadilan."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)12",
        'title' => "VIOLATING A COURT ORDER (JUDGE DECISION)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Melanggar perintah/keputusan resmi pengadilan (misal restraining order)."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)13",
        'title' => "CONTEMPT OF COURT (JUDGE DECISION)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Penghinaan terhadap persidangan atau wewenang majelis hakim di pengadilan."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)14",
        'title' => "NEGLECT OF PUBLIC DUTY",
        'fine' => 7500,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Pengabaian atau menolak menjalankan kewajiban resmi yang diamanatkan jabatan publik."
    ],
    [
        'category' => "PUBLIC ORDER (PASAL 5)",
        'code' => "(5)15",
        'title' => "CORRUPTION OF PUBLIC OFFICE (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penyalahgunaan wewenang jabatan publik untuk keuntungan pribadi (korupsi/suap)."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)00",
        'title' => "MISDEMEANOR POSSESSION OF SCHEDULE 1 CONTROL SUBSTANCE",
        'fine' => 2000,
        'jail_time' => 15,
        'type' => "Misdemeanor",
        'description' => "Memiliki narkotika Schedule I kurang dari 60 gram (3 paket atau kurang)."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)01",
        'title' => "FELONY POSSESSION OF SCHEDULE 1 CONTROL SUBSTANCE",
        'fine' => 10000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Memiliki narkotika Schedule I lebih dari 61 gram (lebih dari 3 paket)."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)02",
        'title' => "MISDEMEANOR POSSESSION OF A SCHEDULE II CONTROLLED SUBSTANCES",
        'fine' => 5000,
        'jail_time' => 35,
        'type' => "Felony",
        'description' => "Memiliki narkotika Schedule II kurang dari 100 gram (1 paket atau kurang)."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)03",
        'title' => "FELONY POSSESSION OF A SCHEDULE II CONTROLLED SUBSTANCES",
        'fine' => 20000,
        'jail_time' => 50,
        'type' => "Felony",
        'description' => "Memiliki narkotika Schedule II lebih dari 101 gram (lebih dari 1 paket)."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)04",
        'title' => "DRUG SMUGGLING",
        'fine' => 50000,
        'jail_time' => 130,
        'type' => "Felony",
        'description' => "Penyelundupan seluruh jenis narkotika dalam jumlah besar (2,000 gram atau lebih)."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)05",
        'title' => "DRUG TRAFFICKING (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Perdagangan narkotika skala masif (4,000 gram atau lebih). Dihukum lewat Court Verdict."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)06",
        'title' => "DRUG MANUFACTURING (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Memproduksi, menanam, atau mengolah narkotika terlarang."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)07",
        'title' => "A POSSESSION OF DRUG PARAPHERNALIA ( LESS THAN 10 )",
        'fine' => 20000,
        'jail_time' => 50,
        'type' => "Felony",
        'description' => "Memiliki alat produksi/pengolahan narkotika kurang dari 10 item secara tidak sah."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)07-131",
        'title' => "B POSSESSION OF DRUG PARAPHERNALIA ( COURT VERDICT )",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Memiliki alat produksi/pengolahan narkotika 10 item atau lebih."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)08",
        'title' => "DISTRIBUTE OF A SCHEDULE CATEGORY CONTROLLED SUBSTANCES",
        'fine' => 20000,
        'jail_time' => 100,
        'type' => "Felony",
        'description' => "Mendistribusikan narkotika dengan jumlah total lebih dari 800 gram."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)08-133",
        'title' => "DRUGS SELLING",
        'fine' => 5000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Menjual atau menawarkan narkotika secara langsung kepada orang lain."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)10",
        'title' => "UNLAWFUL POSSESSION OF POPPY",
        'fine' => 5000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Setiap orang yang secara sengaja memiliki lebih dari 101 kilogram poppy tanpa izin atau wewenang hukum yang sah."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)11",
        'title' => "FELONY POSSESSION OF POPPY",
        'fine' => 15000,
        'jail_time' => 80,
        'type' => "Felony",
        'description' => "Setiap orang yang secara sengaja memiliki 200 kg hingga 300 kg poppy tanpa izin atau wewenang hukum yang sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)01",
        'title' => "POSSESSION OF AN UNLICENSED FIREARM [CLASS 1]",
        'fine' => 1000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Memiliki atau membawa senjata api Kelas 1 (seperti pistol genggam) tanpa izin lisensi negara yang sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)02",
        'title' => "POSSESSION OF AN UNLICENSED FIREARM [CLASS 2]",
        'fine' => 10000,
        'jail_time' => 50,
        'type' => "Felony",
        'description' => "Memiliki atau membawa senjata api Kelas 2 (seperti shotgun atau senapan) tanpa izin lisensi yang sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)03",
        'title' => "CRIMINAL POSSESSION OF A FIREARM [CLASS 1]",
        'fine' => 1200,
        'jail_time' => 12,
        'type' => "Misdemeanor",
        'description' => "Kepemilikan senjata api Kelas 1 secara ilegal oleh individu terlarang (seperti mantan narapidana)."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)04",
        'title' => "CRIMINAL POSSESSION OF A FIREARM [CLASS 2]",
        'fine' => 30600,
        'jail_time' => 45,
        'type' => "Felony",
        'description' => "Memiliki senjata api Kelas 2 saat melakukan tindak kejahatan atau saat dalam masa bebas bersyarat."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)05",
        'title' => "CRIMINAL POSSESSION OF A FIREARM [CLASS 3]",
        'fine' => 85000,
        'jail_time' => 60,
        'type' => "Felony",
        'description' => "Kepemilikan senjata api Kelas 3 (senjata otomatis atau kelas militer) tanpa izin clearance federal."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)06",
        'title' => "CRIMINAL POSSESSION OF A GOVERNMENT-ISSUE FIREARM",
        'fine' => 30000,
        'jail_time' => 100,
        'type' => "Felony",
        'description' => "Kepemilikan ilegal atas senjata api dinas resmi penerbitan pemerintah/kepolisian/militer."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)07",
        'title' => "CRIMINAL POSSESSION OF A GOVERNMENT ISSUED BATON",
        'fine' => 200,
        'jail_time' => 5,
        'type' => "Misdemeanor",
        'description' => "Kepemilikan ilegal tongkat pemukul (baton) dinas resmi kepolisian."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)08",
        'title' => "CRIMINAL POSSESSION OF A GOVERNMENT ISSUED TASER",
        'fine' => 1000,
        'jail_time' => 15,
        'type' => "Misdemeanor",
        'description' => "Kepemilikan atau penggunaan senjata taser dinas resmi pemerintah secara tidak sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)09",
        'title' => "POSSESSION OF UNAUTHORIZED DEVICE ( HACKING DEVICE )",
        'fine' => 3000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Memiliki perangkat keras/lunak ilegal yang dirancang untuk meretas atau bypass sistem keamanan resmi."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)10",
        'title' => "POSSESSION OF DESTRUCTIVE DEVICES (COURT VERDICT)",
        'fine' => 800,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Memiliki perangkat peledak merusak seperti bom pipa, granat, atau senjata pemusnah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)11",
        'title' => "CRIMINAL USE OF EXPLOSIVES",
        'fine' => 20000,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Menggunakan bahan peledak (dinamit, granat) yang menimbulkan kerusakan atau ancaman kejahatan."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)12",
        'title' => "MISDEMEANOR POSSESSION OF THERMITE CHARGE",
        'fine' => 5500,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Memiliki bahan peledak thermite charge dalam kuantitas kecil tanpa niat jahat utama."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)13",
        'title' => "FELONY POSSESSION OF THERMITE CHARGE",
        'fine' => 12000,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Memiliki thermite charge secara ilegal dengan niat melakukan pengrusakan besar."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)14",
        'title' => "FAILURE TO REPORT A STOLEN FIREARM",
        'fine' => 3000,
        'jail_time' => 5,
        'type' => "Felony",
        'description' => "Gagal melaporkan kehilangan atau pencurian senjata api milik pribadi kepada aparat penegak hukum."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)15",
        'title' => "CRIMINAL USE OF A FIREARM",
        'fine' => 1500,
        'jail_time' => 8,
        'type' => "Misdemeanor",
        'description' => "Menggunakan atau menembakkan senjata api saat melakukan aksi tindak kejahatan."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)16",
        'title' => "BRANDISHING OF A FIREARM",
        'fine' => 4500,
        'jail_time' => 7,
        'type' => "Felony",
        'description' => "Mengacungkan atau mempertunjukkan senjata api secara mengancam di tempat umum tanpa alasan hukum."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)17",
        'title' => "BRANDISHING NON FIREARM",
        'fine' => 2000,
        'jail_time' => 5,
        'type' => "Misdemeanor",
        'description' => "Mengacungkan senjata non-senjata api (seperti pisau atau benda tumpul) secara mengancam di tempat umum."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)18",
        'title' => "WEAPON DISCHARGE VIOLATION",
        'fine' => 5000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Menembakkan senjata api di lokasi tidak aman atau secara sembrono di ruang publik."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)19",
        'title' => "UNLAWFUL POSSESSION OF AMMUNITION",
        'fine' => 1345,
        'jail_time' => 5,
        'type' => "Misdemeanor",
        'description' => "Memiliki amunisi tanpa izin lisensi resmi yang sah (walau tidak membawa senjata)."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)20",
        'title' => "ILLEGAL DISTRIBUTION OF AMMUNITION",
        'fine' => 5460,
        'jail_time' => 12,
        'type' => "Felony",
        'description' => "Menjual atau mendistribusikan amunisi secara ilegal kurang dari 2000 butir."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)21",
        'title' => "FIRST DEGREE CRIMINAL SALE OF A LEGALIZED FIREARM [CLASS 1]",
        'fine' => 12250,
        'jail_time' => 60,
        'type' => "Felony",
        'description' => "Menjual hingga 10 senjata api Kelas 1 legal tanpa lisensi resmi sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)22",
        'title' => "SECOND DEGREE CRIMINAL SALE OF A LEGALIZED FIREARM [CLASS 1]",
        'fine' => 8250,
        'jail_time' => 40,
        'type' => "Felony",
        'description' => "Menjual hingga 5 senjata api Kelas 1 legal tanpa lisensi resmi sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)23",
        'title' => "THIRD DEGREE CRIMINAL SALE OF A LEGALIZED FIREARM [CLASS 1]",
        'fine' => 4750,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Menjual hingga 2 senjata api Kelas 1 legal tanpa lisensi resmi sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)27",
        'title' => "FIRST DEGREE CRIMINAL SALE OF GOVERNMENT ISSUED FIREARM",
        'fine' => 60000,
        'jail_time' => 150,
        'type' => "Felony",
        'description' => "Menjual hingga 10 senjata api dinas pemerintah secara tidak sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)28",
        'title' => "SECOND DEGREE CRIMINAL SALE OF GOVERNMENT ISSUED FIREARM",
        'fine' => 40000,
        'jail_time' => 120,
        'type' => "Felony",
        'description' => "Menjual hingga 5 senjata api dinas pemerintah secara tidak sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)28-161",
        'title' => "THIRD DEGREE CRIMINAL SALE OF GOVERNMENT ISSUED FIREARM",
        'fine' => 20000,
        'jail_time' => 80,
        'type' => "Felony",
        'description' => "Menjual hingga 2 senjata api dinas pemerintah secara tidak sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)30",
        'title' => "CRIMINAL SALE OF AN ILLEGAL WEAPON NOR DESTRUCTIVE DEVICES",
        'fine' => 50000,
        'jail_time' => 120,
        'type' => "Felony",
        'description' => "Menjual senjata terlarang atau bahan peledak secara ilegal tanpa wewenang."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)31",
        'title' => "MANUFACTURE OF A DESTRUCTIVE DEVICE OR PROHIBITED WEAPON (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Merakit, memproduksi, atau merancang senjata terlarang atau perangkat peledak merusak."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)32",
        'title' => "FLYING INTO RESTRICTED AIRSPACE",
        'fine' => 1000,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Menerbangkan pesawat udara ke wilayah udara terlarang atau pangkalan militer tanpa izin."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)33",
        'title' => "PILOTING WITHOUT A PROPER LICENSE",
        'fine' => 500,
        'jail_time' => 5,
        'type' => "Misdemeanor",
        'description' => "Mengemudikan pesawat udara tanpa memiliki lisensi pilot resmi yang valid."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)34",
        'title' => "VIGILANTISM",
        'fine' => 200,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Main hakim sendiri atau mengejar tersangka kejahatan tanpa wewenang hukum sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)35",
        'title' => "JAYWALKING",
        'fine' => 50,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Menyeberang jalan raya di luar area penyeberangan resmi (zebra cross) atau mengabaikan sinyal."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)36",
        'title' => "WEAPON SMUGGLING (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penyelundupan senjata api dalam jumlah besar (> 8 senjata) ke organisasi kejahatan."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)37",
        'title' => "EAVESDROPPING",
        'fine' => 875,
        'jail_time' => 8,
        'type' => "Misdemeanor",
        'description' => "Memasang alat penyadap atau mendengarkan percakapan pribadi orang lain secara ilegal."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)38",
        'title' => "ATTEMPTED PRISON BREAK",
        'fine' => 10000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Percobaan melarikan diri dari tahanan hukum atau fasilitas penjara."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)39",
        'title' => "PRISON BREAK",
        'fine' => 50000,
        'jail_time' => 40,
        'type' => "Felony",
        'description' => "Berhasil melarikan diri dari tahanan hukum atau fasilitas penjara."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)40",
        'title' => "ACCESSORY TO PRISON BREAK",
        'fine' => 20000,
        'jail_time' => 50,
        'type' => "Felony",
        'description' => "Membantu atau memfasilitasi pelarian narapidana dari tahanan hukum."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)41",
        'title' => "HARBORING FUGITIVE (COURT VERDICT) (DEATH SENTENCE)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Menyembunyikan, melindungi, atau memberi tempat tinggal buronan yang melarikan diri dari penangkapan."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)42",
        'title' => "DRIVE-BY SHOOTING",
        'fine' => 5250,
        'jail_time' => 15,
        'type' => "Felony",
        'description' => "Menembakkan senjata api dari kendaraan melaju ke arah orang, bangunan, atau fasilitas publik."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)43",
        'title' => "MISDEMEANOR POSSESSION OF BULLETPROOF VEST",
        'fine' => 3280,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Memiliki romper rompi tahan peluru (bulletproof vest) kurang dari 10 buah secara ilegal."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)44",
        'title' => "FELONY POSSESSION OF BULLETPROOF VEST (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Memiliki rompi tahan peluru 10 buah atau lebih secara tidak sah tanpa izin resmi."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)45",
        'title' => "MISDEMEANOR UNLAWFUL POSSESSION OF WEAPON COMPONENT",
        'fine' => 5000,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Memiliki komponen rakitan senjata terlarang kurang dari 20 unit secara tidak sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)46",
        'title' => "FELONY UNLAWFUL POSSESSION OF WEAPON COMPONENT",
        'fine' => 7000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Memiliki komponen rakitan senjata terlarang 20 unit atau lebih secara tidak sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)47",
        'title' => "MANUFACTURING OF WEAPON COMPONENT (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Memproduksi atau merakit komponen senjata terlarang tanpa izin wewenang yang sah."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)48",
        'title' => "AMMUNITION SMUGGLING (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penyelundupan amunisi skala besar melebihi 2000 butir ke grup atau organisasi kejahatan."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)01",
        'title' => "VEHICLE REGISTRATION VIOLATION",
        'fine' => 200,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Pelanggaran registrasi kendaraan, plat nomor kedaluwarsa, atau dokumen registrasi palsu."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)02",
        'title' => "HIT AND RUN",
        'fine' => 1000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Melarikan diri dari lokasi kecelakaan setelah menyebabkan kerusakan properti atau cedera fisik."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)04",
        'title' => "EVADING PEACE OFFICER ON AIRCRAFT",
        'fine' => 1500,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Kabur dari kejaran petugas penegak hukum menggunakan pesawat udara."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)05",
        'title' => "UNSAFE USAGE OF A BICYCLE",
        'fine' => 250,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengendarai sepeda secara ugal-ugalan yang membahayakan pejalan kaki atau pengguna jalan lain."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)06",
        'title' => "RECKLESS DRIVING",
        'fine' => 500,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Mengemudikan kendaraan secara ugal-ugalan yang membahayakan keselamatan jiwa dan properti."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)07",
        'title' => "FAILURE TO PRESENT IDENTIFICATION ( TRAFFIC )",
        'fine' => 200,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Gagal memamerkan atau menunjukkan SIM/ID yang valid saat diberhentikan dalam pemeriksaan traffic stop."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)08",
        'title' => "RECKLESS EVADING OF A PEACE OFFICER",
        'fine' => 1000,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Melarikan diri dari petugas dengan cara mengemudi ugal-ugalan dan membahayakan keselamatan publik."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)09",
        'title' => "AERIAL EVASION",
        'fine' => 800,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Melarikan diri dari kejaran petugas menggunakan drone, pesawat, atau transportasi udara."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)10",
        'title' => "RIDING ON A SIDEWALK",
        'fine' => 100,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengendarai kendaraan bermotor atau sepeda di atas trotoar pejalan kaki."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)11",
        'title' => "ILLEGAL PASSING",
        'fine' => 150,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Menyalip kendaraan di zona larangan menyalip atau secara membahayakan."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)12",
        'title' => "ILLEGAL TURN",
        'fine' => 150,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Berbelok atau melakukan U-turn di lokasi terlarang."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)13",
        'title' => "DRIVING ON THE WRONG SIDE OF THE ROAD",
        'fine' => 100,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengemudikan kendaraan melawan arus jalan raya."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)14",
        'title' => "NEGLIGENT OPERATION OF A VEHICLE",
        'fine' => 100,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Kelalaian mengemudi yang menimbulkan potensi bahaya lalu lintas."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)15",
        'title' => "YIELD VIOLATION",
        'fine' => 25,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Menolak memberikan jalan kepada kendaraan lain yang memiliki hak utama di jalan."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)16",
        'title' => "FAILURE TO OBEY TRAFFIC CONTROL DEVICES",
        'fine' => 100,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengabaikan sinyal lampu lalu lintas, rambu stop, atau marka jalan."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)17",
        'title' => "FAILURE TO YIELD TO EMERGENCY VEHICLE",
        'fine' => 100,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Menolak memberi jalan / menepi saat kendaraan darurat (polisi/ambulans) sirine aktif."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)18",
        'title' => "UNAUTHORIZED PARKING",
        'fine' => 75,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Memarkirkan kendaraan di area terlarang (jalur pemadam, tempat disabilitas)."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)19",
        'title' => "THIRD DEGREE SPEEDING",
        'fine' => 300,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Speeding / melebihi batas kecepatan 61 - 80 KMH."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)20",
        'title' => "SECOND DEGREE SPEEDING",
        'fine' => 500,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Speeding / melebihi batas kecepatan 81 - 120 KMH."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)21",
        'title' => "FIRST DEGREE SPEEDING",
        'fine' => 800,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Speeding / melebihi batas kecepatan di atas 121 KMH."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)22",
        'title' => "DRIVING WITHOUT A VALID LICENSE",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengemudikan kendaraan tanpa memiliki SIM yang sah."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)23",
        'title' => "DRIVING WHILE INTOXICATED",
        'fine' => 250,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengemudikan kendaraan dalam pengaruh alkohol."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)24",
        'title' => "DRIVING UNDER THE INFLUENCE",
        'fine' => 250,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengemudikan kendaraan dalam pengaruh obat-obatan/narkotika."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)25",
        'title' => "DRIVING WITHOUT USE OF HEADLIGHTS",
        'fine' => 150,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Mengemudi di malam hari tanpa menyalakan lampu utama."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)26",
        'title' => "OPERATING AN UNSAFE VEHICLE",
        'fine' => 200,
        'jail_time' => 5,
        'type' => "Misdemeanor",
        'description' => "Mengemudikan kendaraan yang tidak layak jalan karena kerusakan mekanis parah."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)27",
        'title' => "TINTED WINDOWS",
        'fine' => 250,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Kaca film kendaraan terlalu gelap melebihi batas 30%."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)28",
        'title' => "VEHICULAR NOISE VIOLATION",
        'fine' => 500,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Knalpot kendaraan bising/brong melebihi batas desibel yang diizinkan."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)29",
        'title' => "UNAUTHORIZED SPEED CONTESTS",
        'fine' => 10000,
        'jail_time' => 8,
        'type' => "Felony",
        'description' => "Menyelenggarakan atau berpartisipasi dalam balap liar di jalan umum."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)30",
        'title' => "STREET RACING",
        'fine' => 15000,
        'jail_time' => 35,
        'type' => "Felony",
        'description' => "Berpartisipasi aktif dalam balapan mobil/motor di jalanan publik."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)31",
        'title' => "POSSESSION OF NITROUS OXIDE",
        'fine' => 2500,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Memiliki tabung nitrous oxide (NOS) ilegal untuk akselerasi kendaraan."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)32",
        'title' => "USE OF NITROUS OXIDE",
        'fine' => 2700,
        'jail_time' => 22,
        'type' => "Felony",
        'description' => "Menyemprotkan/menggunakan NOS saat mengemudi di jalan umum."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)33",
        'title' => "POSSESSION OF AN ILLEGAL RACING DEVICE",
        'fine' => 1570,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Memiliki atau menginstal modul bypass limiter / perangkat balap ilegal."
    ],
    [
        'category' => "VEHICLE CODES (PASAL 8)",
        'code' => "(8)34",
        'title' => "FAILURE TO USE REQUIRED SAFETY EQUIPMENT",
        'fine' => 400,
        'jail_time' => 0,
        'type' => "Misdemeanor",
        'description' => "Tidak memakai sabuk pengaman atau helm keselamatan saat berkendara di jalan umum."
    ],
    [
        'category' => "PARKS & WILDLIFE (PASAL 9)",
        'code' => "9.01 HUNTING IN AN UNREGULATED AREA",
        'title' => "9.01 HUNTING IN AN UNREGULATED AREA",
        'fine' => 600,
        'jail_time' => 10,
        'type' => "Misdemeanor",
        'description' => "Berburu di luar area/zona perburuan resmi yang ditetapkan oleh Negara San Andreas. Pelanggar tunduk pada penggeledahan atas hewan/bagian tubuh hewan hasil buruan di luar zona resmi."
    ],
    [
        'category' => "PARKS & WILDLIFE (PASAL 9)",
        'code' => "9.02 POACHING",
        'title' => "9.02 POACHING",
        'fine' => 10000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Perburuan liar: Sengaja memikat, memasang perangkap, memburu, melukai, membunuh, atau membahayakan hewan yang masuk dalam daftar dilindungi negara (seperti hiu biru, sturgeon, hiu macan, penyu laut, hiu martil, lumba-lumba sungai pink, dll)."
    ],
    [
        'category' => "PARKS & WILDLIFE (PASAL 9)",
        'code' => "9.03 HUNTING/FISHING WITHOUT A LICENSE",
        'title' => "9.03 HUNTING/FISHING WITHOUT A LICENSE",
        'fine' => 5000,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Melakukan kegiatan perburuan atau memancing tanpa memiliki lisensi/izin resmi yang dikeluarkan oleh negara bagian."
    ],
    [
        'category' => "PARKS & WILDLIFE (PASAL 9)",
        'code' => "9.04 ANIMAL CRUELTY",
        'title' => "9.04 ANIMAL CRUELTY",
        'fine' => 1500,
        'jail_time' => 15,
        'type' => "Misdemeanor",
        'description' => "Sengaja menimbulkan penderitaan, cedera, atau kematian pada hewan melalui penganiayaan, penelantaran, penyiksaan, adu hewan, racun, atau tidak memberikan perawatan medis/makanan yang diperlukan."
    ],
    [
        'category' => "NARCOTICS (PASAL 6)",
        'code' => "(6)12",
        'title' => "AGGRAVATED POSSESSION OF POPPY (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Secara sengaja memiliki poppy dalam jumlah besar (>= 301 kg) tanpa izin, lisensi, atau pembebasan sah sesuai hukum yang berlaku (Kejahatan Berat Narkotika)."
    ],
    [
        'category' => "PUBLIC SAFETY (PASAL 7)",
        'code' => "(7)49",
        'title' => "USAGE OF SUPPRESSOR",
        'fine' => 5000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Secara sengaja menggunakan, memasang, memperlengkapi, atau menembakkan senjata api yang dipasangi peredam suara (suppressor/silencer) tanpa izin sah."
    ],
    [
        'category' => "OFFENSES AGAINST PROPERTY (PASAL 3)",
        'code' => "(3)28-220",
        'title' => "VANDALISM",
        'fine' => 4500,
        'jail_time' => 8,
        'type' => "Felony",
        'description' => "Sengaja dan secara melawan hukum merusak, mencoret-coret (graffiti), menggores, atau merusak fisik properti milik orang lain atau publik tanpa izin pemilik."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 01. STALKING",
        'title' => "(2) 01. STALKING",
        'fine' => 3000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Sengaja dan berulang kali mengikuti, mengganggu, atau mengancam orang lain sehingga menimbulkan rasa takut yang wajar atas keselamatan diri atau keluarga dekatnya."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 02. HARASSMENT",
        'title' => "(2) 02. HARASSMENT",
        'fine' => 30000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Melakukan tindakan berulang atau berat yang mengintimidasi, mengancam, atau menakut-nakuti individu lain tanpa tujuan yang sah."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 03. SEXUAL ASSAULT",
        'title' => "(2) 03. SEXUAL ASSAULT",
        'fine' => 30000,
        'jail_time' => 30,
        'type' => "Felony",
        'description' => "Secara tidak sah menyentuh, meraba, atau melakukan kontak seksual dengan orang lain tanpa persetujuan, dengan paksaan, ancaman, atau intimidasi."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 04. SEXUAL BATTERY",
        'title' => "(2) 04. SEXUAL BATTERY",
        'fine' => 50000,
        'jail_time' => 50,
        'type' => "Felony",
        'description' => "Sengaja dan secara tidak sah menggunakan kekerasan atau ancaman fisik untuk melakukan kontak seksual terhadap orang lain tanpa persetujuan."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 05. INDECENT EXPOSURE",
        'title' => "(2) 05. INDECENT EXPOSURE",
        'fine' => 2500,
        'jail_time' => 5,
        'type' => "Misdemeanor",
        'description' => "Sengaja memperlihatkan alat kelamin di tempat umum atau di hadapan orang lain untuk tujuan menyinggung atau memuaskan nafsu seksual."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 06. LEWD OR DISSOLUTE CONDUCT",
        'title' => "(2) 06. LEWD OR DISSOLUTE CONDUCT",
        'fine' => 8000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Melakukan tindakan cabul, tidak senonoh, atau perbuatan melanggar kesusilaan di tempat umum yang dapat dilihat oleh orang lain."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 07. PROSTITUTION",
        'title' => "(2) 07. PROSTITUTION",
        'fine' => 60000,
        'jail_time' => 65,
        'type' => "Felony",
        'description' => "Menyepakati, terlibat, atau menawarkan tindakan seksual untuk mendapatkan uang atau imbalan materi lainnya."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 08. PANDERING/PIMPING (COURT VERDICT)",
        'title' => "(2) 08. PANDERING/PIMPING (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Merekrut, mendorong, memfasilitasi, atau mengambil keuntungan materi dari hasil pelacuran orang lain, atau mengendalikan penghasilan mereka (Mucikari/Germo)."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 09. RAPE (COURT VERDICT)",
        'title' => "(2) 09. RAPE (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pemerkosaan: Melakukan hubungan seksual dengan orang lain tanpa persetujuan, melalui paksaan, kekerasan, ancaman, atau saat korban tidak berdaya."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 10. RAPE STATUTORY (COURT VERDICT)",
        'title' => "(2) 10. RAPE STATUTORY (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pemerkosaan Anak: Melakukan hubungan seksual dengan anak di bawah usia persetujuan sah menurut hukum, terlepas dari ada atau tidaknya persetujuan."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 11. HUMAN TRAFFICKING (COURT VERDICT)",
        'title' => "(2) 11. HUMAN TRAFFICKING (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Tindak Pidana Perdagangan Orang (TPPO): Merekrut, menampung, memindahkan, atau memperoleh orang untuk eksploitasi tenaga kerja atau seksual melalui paksaan, penipuan, atau ancaman."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 12. FORCED COERCION (COURT VERDICT)",
        'title' => "(2) 12. FORCED COERCION (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pemaksaan secara paksa: Memaksa orang lain melakukan kerja paksa, layanan, atau tindakan seksual bertentangan dengan kehendaknya melalui ancaman atau penyalahgunaan wewenang."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 13. MINOR ALCOHOL/TOBACCO VIOLATION",
        'title' => "(2) 13. MINOR ALCOHOL/TOBACCO VIOLATION",
        'fine' => 5000,
        'jail_time' => 10,
        'type' => "Felony",
        'description' => "Anak di bawah umur yang secara tidak sah memiliki atau mengonsumsi minuman beralkohol atau produk tembakau."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 14. MINOR PORNOGRAPHY VIOLATION",
        'title' => "(2) 14. MINOR PORNOGRAPHY VIOLATION",
        'fine' => 20000,
        'jail_time' => 25,
        'type' => "Felony",
        'description' => "Anak di bawah usia 18 tahun yang secara tidak sah memiliki, membuat, atau mendistribusikan materi eksplisit yang menggambarkan anak di bawah umur."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 15. SALE OF PORNOGRAPHY TO A MINOR",
        'title' => "(2) 15. SALE OF PORNOGRAPHY TO A MINOR",
        'fine' => 15000,
        'jail_time' => 20,
        'type' => "Felony",
        'description' => "Sengaja menjual, mendistribusikan, atau memberikan materi pornografi kepada anak di bawah umur."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 16. SALE OF ALCOHOL/TOBACCO TO A MINOR",
        'title' => "(2) 16. SALE OF ALCOHOL/TOBACCO TO A MINOR",
        'fine' => 7000,
        'jail_time' => 12,
        'type' => "Felony",
        'description' => "Sengaja menjual atau menyediakan minuman beralkohol atau produk tembakau kepada anak di bawah umur."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 17. CHILD NEGLECT (COURT VERDICT)",
        'title' => "(2) 17. CHILD NEGLECT (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penelantaran Anak: Orang tua atau wali yang sengaja gagal memberikan pengasuhan, pengawasan, atau perlindungan yang diperlukan bagi anak sehingga membahayakan kesehatan dan keselamatan anak."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 18. CHILD ABUSE (COURT VERDICT)",
        'title' => "(2) 18. CHILD ABUSE (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penganiayaan Anak: Sengaja menimbulkan cedera fisik, hukuman kejam, atau pelecehan seksual terhadap anak di bawah umur."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 19. DESECRATION OF HUMAN CORPSE (COURT VERDICT)",
        'title' => "(2) 19. DESECRATION OF HUMAN CORPSE (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Penistaan Jenazah: Sengaja merusak, merendahkan, atau menganiaya mayat/jenazah manusia yang melanggar norma dan kesusilaan umum."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 20. ILLEGAL POSSESSION OF HUMAN REMAINS (COURT VERDICT)",
        'title' => "(2) 20. ILLEGAL POSSESSION OF HUMAN REMAINS (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Secara tidak sah memiliki, mengangkut, atau menyembunyikan bagian atau sisa-sisa jenazah manusia tanpa izin hukum."
    ],
    [
        'category' => "SEXUAL OFFENSES (PASAL 2)",
        'code' => "(2) 21. ILLEGAL EXHUMATION (COURT VERDICT)",
        'title' => "(2) 21. ILLEGAL EXHUMATION (COURT VERDICT)",
        'fine' => 0,
        'jail_time' => 0,
        'type' => "Court Verdict",
        'description' => "Pembongkaran Makam Ilegal: Secara tidak sah menggali, membongkar, atau memindahkan jenazah manusia dari situs pemakaman tanpa izin hukum."
    ]
];

        foreach ($penalCodes as $pc) {
            PenalCode::create($pc);
        }

        // 3. Radio Codes
        $radioCodes = [
            ['code' => '10-4', 'meaning' => 'Pesan diterima / Dimengerti', 'category' => '10-Codes'],
            ['code' => '10-6', 'meaning' => 'Busy / Sedang penanganan di lokasi', 'category' => '10-Codes'],
            ['code' => '10-7', 'meaning' => 'Off Duty / Selesai tugas', 'category' => '10-Codes'],
            ['code' => '10-8', 'meaning' => 'On Duty / Siap bertugas', 'category' => '10-Codes'],
            ['code' => '10-14', 'meaning' => 'Pengawalan uang / barang berharga', 'category' => '10-Codes'],
            ['code' => '10-15', 'meaning' => 'Tersangka diamankan di dalam kendaraan', 'category' => '10-Codes'],
            ['code' => '10-20', 'meaning' => 'Lokasi saat ini (Location)', 'category' => '10-Codes'],
            ['code' => '10-23', 'meaning' => 'Arrived on Scene / Tiba di TKP', 'category' => '10-Codes'],
            ['code' => '10-32', 'meaning' => 'Man with Firearms / Seseorang membawa senjata api', 'category' => 'Emergency'],
            ['code' => '10-34', 'meaning' => 'Suspicious Activity / Aktivitas mencurigakan / Narkoba', 'category' => '10-Codes'],
            ['code' => '10-38', 'meaning' => 'High Risk / Felony Vehicle Stop', 'category' => '10-Codes'],
            ['code' => '10-41', 'meaning' => 'Memulai tugas (In Service)', 'category' => '10-Codes'],
            ['code' => '10-42', 'meaning' => 'Mengakhiri tugas (Out of Service)', 'category' => '10-Codes'],
            ['code' => '10-50', 'meaning' => 'Kecelakaan lalu lintas (Vehicle Accident)', 'category' => '10-Codes'],
            ['code' => '10-55', 'meaning' => 'Traffic Stop kendaraan', 'category' => '10-Codes'],
            ['code' => '10-57', 'meaning' => 'Active Pursuit / Pengejaran kendaraan aktif', 'category' => 'Emergency'],
            ['code' => '10-70', 'meaning' => 'Kebakaran (Fire)', 'category' => 'Emergency'],
            ['code' => '10-71', 'meaning' => 'Active Shootout / Baku tembak aktif / Gang War', 'category' => 'Emergency'],
            ['code' => '10-78', 'meaning' => 'Requesting Backup / Meminta bantuan unit', 'category' => 'Emergency'],
            ['code' => '10-95', 'meaning' => 'Tersangka berhasil diborgol / ditahan', 'category' => '10-Codes'],
            ['code' => '10-99', 'meaning' => 'Officer in Distress / Petugas dalam bahaya darurat', 'category' => 'Emergency'],
            ['code' => 'Code 3', 'meaning' => 'Emergency Response (Sirine & Lampu Merah)', 'category' => 'Status Codes'],
            ['code' => 'Code 4', 'meaning' => 'Situasi Aman & Terkendali (Clear)', 'category' => 'Status Codes'],
        ];

        foreach ($radioCodes as $rc) {
            RadioCode::create($rc);
        }

        // 4. Weapon Classes
        $weaponClasses = [
            ['class_name' => 'Police Class 1', 'allowed_ranks' => 'Cadet / Rookie & Above', 'allowed_weapons' => 'Combat Pistol, AP Pistol, PD 2011, Heavy Pistol, JR136 Timberstrike, Taser, Flashlight, Nightstick', 'rules' => 'Senjata dinas utama untuk patroli harian.'],
            ['class_name' => 'Police Class 2', 'allowed_ranks' => 'Officer II & Above / Special Patrol', 'allowed_weapons' => 'Combat PDW, Assault SMG, SMG MK2, Revolver MK2, MI9, Colt Revolver, Pump Shotgun MK2, Bullpup Shotgun, Combat V7X, Vector Sector', 'rules' => 'Hanya dikeluarkan saat respon Code 3, Robbery Class 2, atau High Risk Call.'],
            ['class_name' => 'Police Class 3', 'allowed_ranks' => 'Sergeant & SWAT / Special Ops Qualified', 'allowed_weapons' => 'Carbine Rifle MK2, Special Carbine MK2, Assault Rifle MK2, Bullpup Rifle MK2, CQB Universal Bullpup, Modern Universal Bullpup, SA Tactical Rifle, XEN7 Warden PD, RRC3 Achromic', 'rules' => 'Otorisasi Incident Commander / Senior Command Officer.'],
            ['class_name' => 'Criminal Class 1', 'allowed_ranks' => 'Illicit Civilians', 'allowed_weapons' => 'Pistol .50, Ceramic Pistol, X17 Modular, Machine Pistol, ST84 Skulln Sword, MX18 Classyblue', 'rules' => 'Senjata api genggam ringan kriminal.'],
            ['class_name' => 'Criminal Class 2', 'allowed_ranks' => 'Gangsters & Robbers', 'allowed_weapons' => 'Mini SMG, Micro SMG, SMG, Navy Revolver, KVR, Pump Shotgun, Revolver Black, Sawn Off Shotgun, SDR7, VTN33 Graveshift', 'rules' => 'Senjata otomatis dan shotgun kriminal.'],
            ['class_name' => 'Criminal Class 3', 'allowed_ranks' => 'Cartels & Heavy Syndicate', 'allowed_weapons' => 'Double Action, Assault Rifle, Carbine Rifle, MB47, AGC, BK12, Dragon, Scarl Godzilla, AK47 Purplefunk, AKT, Foolv2 RED, M6A9 Diamond Soul, Scarl Rusty, M4 T Neon, Integrale', 'rules' => 'Senjata militer dan assault rifles kelas berat.'],
        ];

        foreach ($weaponClasses as $wc) {
            WeaponClass::create($wc);
        }

        // 5. Operational Rules & Robbery Matrix
        $rules = [
            ['category' => 'Aturan Umum', 'title' => 'Ketentuan Dasar Robbery', 'content' => '1. Minimal suspect harus memiliki 1 sandera. Jika tidak ada sandera, polisi berhak melakukan breach-in. 2. Maksimal waktu HIT ROBBERY adalah 1 jam sebelum badai. 3. Dilarang melakukan aktivitas kriminal 30 menit sebelum badai.', 'importance' => 'Critical'],
            ['category' => 'Robbery Matrix', 'title' => 'Boosting Car / ATM Robbery Matrix', 'content' => 'Pursuit: 6 min police, Barricade: 4 min police, Max Criminal: 2, Min Police: 6, Weapon Class: Class 1 + All Revolver, Vehicle: Based on Negotiation, Helicopter: Not Allowed.', 'importance' => 'Standard'],
            ['category' => 'Robbery Matrix', 'title' => 'LTD Store Robbery Matrix', 'content' => 'Pursuit: 12 min police, Barricade: 8 min police, Max Criminal: 4, Min Police: 8, Weapon Class: Class 1, Vehicle: Based on Negotiation, Helicopter: Not Allowed.', 'importance' => 'Standard'],
            ['category' => 'Robbery Matrix', 'title' => 'Laundromat / Cash Exchange / Container Matrix', 'content' => 'Pursuit: 12 min police, Barricade: 10 min police, Max Criminal: 6, Min Police: 10, Weapon Class: Class 2, Vehicle: Based on Negotiation, Helicopter: Not Allowed.', 'importance' => 'Standard'],
            ['category' => 'Robbery Matrix', 'title' => 'Jewel Store Robbery Matrix', 'content' => 'Pursuit: 24 min police, Barricade: 10 min police, Max Criminal: 6, Min Police: 10, Weapon Class: Class 2, Vehicle: Based on Negotiation, Helicopter: Not Allowed.', 'importance' => 'Standard'],
            ['category' => 'Robbery Matrix', 'title' => 'Bobcat / Art Asylum Robbery Matrix', 'content' => 'Pursuit: 30 min police, Barricade: 12 min police, Max Criminal: 8, Min Police: 12, Weapon Class: Class 2, Vehicle: Based on Negotiation, Helicopter: Not Allowed.', 'importance' => 'High'],
            ['category' => 'Robbery Matrix', 'title' => 'Fleeca Bank Robbery Matrix', 'content' => 'Pursuit: 30 min police, Barricade: 12 min police, Max Criminal: 8, Min Police: 12, Weapon Class: Class 2, Vehicle: Based on Negotiation, Helicopter: 1 Police Helicopter.', 'importance' => 'High'],
            ['category' => 'Robbery Matrix', 'title' => 'Roxwood / Paleto Bank Robbery Matrix', 'content' => 'Pursuit: 36 min police, Barricade: 14 min police, Max Criminal: 10, Min Police: 14, Weapon Class: Class 3, Vehicle: Based on Negotiation, Helicopter: 1 Police Helicopter.', 'importance' => 'High'],
            ['category' => 'Robbery Matrix', 'title' => 'Pacific Standard Bank Robbery Matrix', 'content' => 'Pursuit: 40 min police, Barricade: 16 min police, Max Criminal: 12, Min Police: 16, Weapon Class: Class 3, Vehicle: Based on Negotiation, Helicopter: 2 Police Helicopters.', 'importance' => 'Critical'],
            ['category' => 'Robbery Matrix', 'title' => 'Maze Bank / Casino Heist Matrix', 'content' => 'Pursuit: 46-50 min police, Barricade: 18-20 min police, Max Criminal: 14-16, Min Police: 18-20, Weapon Class: Class 3, Vehicle: Based on Negotiation, Helicopter: 2 Police Helicopters.', 'importance' => 'Critical'],
            ['category' => 'Tactical Rules', 'title' => 'Ketentuan Barricade & Special Escalation Rules', 'content' => '1. Jika officer lebih sedikit dari badside: Polisi berhak memakai senjata 1 level di atas badside + 1 helikopter. 2. Barricade di luar 5 blok: Polisi berhak ALL-IN officer (senjata tidak dinaikkan). 3. Setup One Way / Tangga Monyet: Polisi berhak ALL-IN officer + senjata 1 level di atas + 1 helikopter.', 'importance' => 'Critical'],
        ];

        foreach ($rules as $r) {
            Rule::create($r);
        }

        // 6. Prosedur Taktis (All 12 SOPs)
        $tacticals = [
            [
                'category' => 'Traffic Stop',
                'title' => 'Prosedur Traffic Stop (10-55)',
                'steps' => "1) Hentikan Kendaraan (Nyalakan sirine/rotator, perintahkan matikan mesin).\n2) Lapor ke Central Dispatch (71-ADAMS/LINCOLN-503 10-55 at location).\n3) Dekati Kendaraan (Jalan di sisi kiri, tunjukkan badge & minta SIM/ID).\n4) Cek Identitas di MDT (Cek Warrant / BOLO).\n5) Konfirmasi Alasan Stop.\n6) Berikan Sanksi (Warning / Ticket).\n7) Akhiri Stop & Lepaskan Kendaraan.\n8) Laporan Selesai / Clear (Code 4).",
                'rules' => 'Jika ada Warrant/BOLO -> Ubah ke Felony Stop (10-38) & panggil backup 10-78.'
            ],
            [
                'category' => 'Felony Stop',
                'title' => 'Prosedur Felony Stop (10-38)',
                'steps' => "1) Lapor Dispatch & Request Backup 10-78.\n2) Perintahkan Matikan Mesin & Buang Kunci Out Window.\n3) Perintahkan Keluar Kendaraan Tangan Terangkat.\n4) Komando Keluar Unit (3... 2... 1... GO).\n5) Pointing Senjata dari Balik Cover.\n6) Posisi Suspect (Mata 1 & Mundur).\n7) Borgol & Pembacaan Hak Miranda.\n8) Pengecekan Kendaraan Suspect.\n9) Penanganan Impound.\n10) Laporan Clear / Code 4.",
                'rules' => 'Kategori High Risk. Wajib bacakan Hak Miranda setelah diborgol.'
            ],
            [
                'category' => 'Suspicious Activity',
                'title' => 'Prosedur 10-34 (Suspicious Activity & Narkoba)',
                'steps' => "1) Pemantauan Visual & Laporan Awal Radio Dispatch.\n2) Interogasi Lisan & Frisking Fisik Ringan.\n3) Penanganan Barang Bukti & Penahanan (10-95).\n4) Transisi Darurat (Pengejaran Active 10-57 jika melarikan diri).",
                'rules' => 'Amankan barang bukti (Take Evidence) & bawa ke Alta / MRPD Station.'
            ],
            [
                'category' => 'Silent Alarm',
                'title' => 'Prosedur 31-A (Silent Alarm & Respon Perampokan Awal)',
                'steps' => "1) Transmisi Respon Radio (31-A Call-out).\n2) Pendekatan Senyap (Silent Approach, sirine mati).\n3) Pembentukan Perimeter Awal (Containment).\n4) Penetapan Saluran TAC & Incident Commander (IC).",
                'rules' => 'Silent approach agar tidak memicu kepanikan / membahayakan warga.'
            ],
            [
                'category' => 'Active Robbery',
                'title' => 'Prosedur 31-B (Active Robbery & Hostage Situation)',
                'steps' => "1) Laporan Radio Respon Awal.\n2) Broadcast Laporan Situasi Aktif (Warna 60, Jumlah 61, Hostage).\n3) Negosiasi Taktis Sandera (Ada sandera -> Negosiasi; Tanpa sandera -> Breach-in).\n4) Transisi Pengejaran (Pursuit Mode).\n5) Clearance Broadcast (Code 4).",
                'rules' => 'Penuhi tuntutan wajar (free passage / no spike) demi keselamatan sandera.'
            ],
            [
                'category' => 'Active Shootout',
                'title' => 'Gang War / Active Shootout (10-71)',
                'steps' => "1) Laporkan 10-71 & tetapkan Code 3 respon darurat.\n2) Dilarang unit pertama langsung menerobos kill zone.\n3) Tunggu di perimeter luar & buat barikade jalan.\n4) Sterilisasi TKP, Uji GSR, Amankan Bukti Senjata & Evakuasi Medis ke Sector A.",
                'rules' => 'Keselamatan Officer prioritas mutlak. Perform GSR Test & Take Evidence.'
            ],
            [
                'category' => 'Perampokan',
                'title' => 'Prosedur Respon Robbery (Perampokan)',
                'steps' => "1) Persyaratan Unit Patroli (ADAM/ROBERT max 3 officer).\n2) First Responder 10-23 & Laporan Visual.\n3) Negosiasi (Sandera -> IC Negotiate; Tanpa Sandera -> Breach-in).\n4) Alokasi Saluran TAC.\n5) Pursuit Transition & Batasan Unit (1 mobil -> 4-5 unit; 2 mobil -> 8-10 unit).\n6) Prosedur VCB (Visual Contact Broken).",
                'rules' => 'Batas unit pengejar disesuaikan ketat dengan jumlah kendaraan tersangka.'
            ],
            [
                'category' => 'Pursuit',
                'title' => 'Prosedur Pursuit (Pengejaran)',
                'steps' => "1) Formasi Iring-iringan (2 Interceptor Henry/Golf depan, 3 Basic Adam/Lincoln belakang).\n2) Air Support / Motor Squad (AIR / MARY) atas izin IC.\n3) Primary Unit fokus 100% nyetir (dilarang callout); Secondary Unit navigator radio.\n4) Clean Pursuit vs Hot Pursuit (Toleransi 1x lompatan tak logis).\n5) Otorisasi PIT setelah 10+ menit atas verbal approval IC/Sergeant.",
                'rules' => 'Max 4-5 unit aktif per kendaraan buronan.'
            ],
            [
                'category' => 'PIT Maneuver',
                'title' => 'Prosedur P.I.T (Precision Immobilization Technique)',
                'steps' => "1) Penyelarasan Posisi (Sejajarkan bumper depan dengan quarter-panel belakang target).\n2) Kontak Fisik Terkendali.\n3) Akselerasi Konstan.\n4) Spin Out (Target putar 180 deg).\n5) Vehicle Pinning oleh Backup Unit.",
                'rules' => 'Kecepatan ideal 40-55 MPH. Butuh verbal authorization dari IC / Sergeant.'
            ],
            [
                'category' => 'Sita Kendaraan',
                'title' => 'Prosedur Impound Sita (Sita Kendaraan)',
                'steps' => "1) Kondisi: Kendaraan di TKP, masuk air, atau berganti kendaraan saat pursuit (butuh izin IC).\n2) Cek F1 Checking Vehicle & Dokumentasi Foto.\n3) Cek MDT & Bagasi/Glovebox.\n4) Amankan Barang Ilegal.\n5) Eksekusi F1 Impound Sita, Catat MDT & Forum Impound Police.",
                'rules' => 'Jika suspect tertangkap, gunakan IMPOUND VEHICLE PUBLIC (bukan Impound Police).'
            ],
            [
                'category' => 'Release Vehicle',
                'title' => 'Prosedur Pengeluaran Kendaraan (Release Vehicle)',
                'steps' => "1) Verifikasi Identitas & Plate Number di MDT & Website Putih.\n2) Cek Notes Profil (kasus khusus / larangan keluar).\n3) Cek Status BOLO & Pelunasan Denda.\n4) Penyerahan & Biaya Regulasi ($5,000 denda resmi).",
                'rules' => 'Dilarang mengeluarkan kendaraan berstatus BOLO / memiliki catatan khusus tanpa izin IC.'
            ],
            [
                'category' => 'Integrasi Body Cam',
                'title' => 'Prosedur & Integrasi Body Cam (ShareX & FiveManage)',
                'steps' => "1) Wajib aktifkan Body Cam sejak 10-41 (On Duty) hingga 10-42 (Off Duty).\n2) Upload ke ShareX / FiveManage / Discord Evidence Channel.\n3) Sertakan URL link bukti video pada Laporan Incident MDT.",
                'rules' => 'Format nama file: [Tanggal] - [Nama Officer] - [Case ID].'
            ],
        ];

        foreach ($tacticals as $t) {
            TacticalProcedure::create($t);
        }

        // 7. Incident Command Structures
        $incidents = [
            [
                'role_name' => 'Incident Commander (IC)',
                'rank_required' => 'Sergeant / Command Staff',
                'responsibilities' => 'Memegang komando tertinggi di TKP, mengelola saluran radio TAC, memberikan otorisasi PIT/Spike/Breach, bernegosiasi atau menunjuk Negosiator, serta menjamin keutuhan barang bukti.',
                'sop_guidelines' => 'Perintah verbal IC wajib dipatuhi seluruh unit responder.'
            ],
            [
                'role_name' => 'Primary Unit (Pursuit Leader)',
                'rank_required' => 'Officer I & Above',
                'responsibilities' => 'Unit terdepan dalam iring-iringan pengejaran (10-57). Mempertahankan kontak visual 100% pada ekor target dan dilarang keras melakukan callout radio demi konsentrasi berkendara.',
                'sop_guidelines' => 'Jika mengalami rintangan/kecelakaan, langsung menyerahkan posisi Primary ke Secondary Unit.'
            ],
            [
                'role_name' => 'Secondary Unit (Radio Navigator)',
                'rank_required' => 'Officer I & Above',
                'responsibilities' => 'Unit kedua dalam pursuit line up. Bertanggung jawab penuh menyuarakan arah jalan, persimpangan, kecepatan, dan dinamika tersangka di radio dispatch.',
                'sop_guidelines' => 'Navigasi jalan yang akurat memungkinkan unit perimeter memotong lajur target.'
            ],
            [
                'role_name' => 'Spike & Containment Unit',
                'rank_required' => 'Officer II & Above',
                'responsibilities' => 'Menyiapkan barikade jalan, memasang Spike Strip dari blind spot tersangka, serta memblok rute pelarian (Box Car).',
                'sop_guidelines' => 'Pemasangan spike wajib dikoordinasikan terlebih dahulu ke radio.'
            ],
            [
                'role_name' => 'Specialized Division - SWAT / METRO',
                'rank_required' => 'SWAT Qualified Officers',
                'responsibilities' => 'Penanganan situasi penyanderaan (31-B), penggerebekan kartel, dan kejahatan bersenjata berat (10-71 Active Shootout).',
                'sop_guidelines' => 'Divisi taktis penerobos utama di area bahaya tinggi.'
            ],
            [
                'role_name' => 'Specialized Division - Air Support (ASD)',
                'rank_required' => 'Air Support Certified Pilot',
                'responsibilities' => 'Unit helikopter untuk pemantauan udara, memberikan visual pelarian suspect dari langit, serta melacak jejak pelarian di area pegunungan/hutan.',
                'sop_guidelines' => 'Maksimal 1-2 helikopter sesuai Robbery Matrix.'
            ],
            [
                'role_name' => 'Specialized Division - High-Speed Intercept (HSIU)',
                'rank_required' => 'HSI Certified Drivers',
                'responsibilities' => 'Unit kendaraan performa tinggi (Corvette/Buffalo STX) khusus pursuit kecepatan tinggi di jalan tol dan area terbuka.',
                'sop_guidelines' => 'Memimpin pursuit di jalur lurus dan medan jalan tol.'
            ],
        ];

        foreach ($incidents as $inc) {
            IncidentCommand::create($inc);
        }

        // 8. Legal Procedures
        $legals = [
            [
                'step_number' => 1,
                'stage_name' => 'Penangkapan & Borgol (Arrest)',
                'guideline_text' => 'Lakukan penangkapan terhadap tersangka secara terukur. Borgol kedua tangan tersangka di belakang punggung (10-95).'
            ],
            [
                'step_number' => 2,
                'stage_name' => 'Pembacaan Hak Miranda (Miranda Rights)',
                'guideline_text' => 'Wajib membacakan Hak Miranda sesaat setelah tersangka diborgol: "Kamu berhak untuk diam, apapun yang kamu katakan dapat digunakan untuk melawan anda dan dibawa ke pengadilan. Anda berhak untuk menunjuk pengacara. jika tidak ada maka kami akan menentukan seorang pengacara untuk anda."'
            ],
            [
                'step_number' => 3,
                'stage_name' => 'Penggeledahan Badan & Kendaraan (Frisk & Search)',
                'guideline_text' => 'Lakukan penggeledahan fisik badan (Frisk) dan bagasi kendaraan. Amankan seluruh barang bukti ilegal (Take Evidence) seperti senjata tanpa izin, narkotika, atau barang curian.'
            ],
            [
                'step_number' => 4,
                'stage_name' => 'Transportasi & Interogasi (Transport & BAP)',
                'guideline_text' => 'Bawa tersangka ke ruang interogasi Stasiun Alta / MRPD. Lakukan pemeriksaan singkat (BAP), foto mugshot, dan konfirmasi barang bukti.'
            ],
            [
                'step_number' => 5,
                'stage_name' => 'Pencatatan MDT & Penahanan (MDT Booking & Jail)',
                'guideline_text' => 'Input seluruh data pelanggaran dan akumulasi denda & hukuman penjara ke dalam sistem MDT. Eksekusi penahanan tersangka di sel penjara (Cell/Jail).'
            ],
        ];

        foreach ($legals as $l) {
            LegalProcedure::create($l);
        }

        // 9. Court Verdicts
        $verdicts = [
            [
                'step_number' => 1,
                'case_type' => 'Judicial Trial',
                'stage_name' => 'Pengajuan Kasus & Berkas BAP (Case Filing)',
                'description' => 'Penyidik LSPD menyusun berkas perkara BAP lengkap beserta barang bukti foto/video Body Cam dan menyerahkannya ke Pengadilan / Kejaksaan.',
                'required_evidence' => 'Foto Barang Bukti, Rekaman Body Cam, Dokumen BAP, Daftar Saksi'
            ],
            [
                'step_number' => 2,
                'case_type' => 'Judicial Trial',
                'stage_name' => 'Sidang Perdana & Pembacaan Dakwaan (Arraignment)',
                'description' => 'Hakim membaca surat dakwaan di hadapan terdakwa dan pengacara penasihat hukum. Terdakwa menyatakan pembelaan (Guilty / Not Guilty).',
                'required_evidence' => 'Surat Dakwaan Jaksa Penuntut Umum'
            ],
            [
                'step_number' => 3,
                'case_type' => 'Judicial Trial',
                'stage_name' => 'Pembuktian & Pemeriksaan Saksi (Evidentiary Hearing)',
                'description' => 'Pemeriksaan saksi-saksi ahli, penyidik polisi, dan pengujian keabsahan barang bukti di persidangan.',
                'required_evidence' => 'Keterangan Saksi Officer, Hasil Uji GSR/Narkoba, Bukti Fisik'
            ],
            [
                'step_number' => 4,
                'case_type' => 'Judicial Trial',
                'stage_name' => 'Vonis Hakim & Eksekusi Hukuman (Court Verdict)',
                'description' => 'Hakim menjatuhkan vonis resmi hukuman penjara khusus, denda kompensasi, atau pencabutan lisensi permanen. Putusan hakim bersifat mengikat dan final.',
                'required_evidence' => 'Salinan Putusan Resmi Pengadilan'
            ],
        ];

        foreach ($verdicts as $v) {
            CourtVerdict::create($v);
        }

        // 10. Promotion Qualifications
        $promotions = [
            [
                'from_rank' => 'Cadet / Rookie',
                'to_rank' => 'Officer I (PO I)',
                'category_type' => 'Administrative & Exam',
                'requirements_list' => "1. Minimal masa kerja 7 hari aktif patroli.\n2. Lulus Ujian SOP Dasar & Penal Code.\n3. Bebas dari sanksi disiplin (0 Strike).\n4. Rekomendasi dari Field Training Officer (FTO)."
            ],
            [
                'from_rank' => 'Officer I (PO I)',
                'to_rank' => 'Officer II (PO II)',
                'category_type' => 'Performance',
                'requirements_list' => "1. Minimal masa kerja 14 hari di rank PO I.\n2. Memiliki jam patroli aktif yang konsisten.\n3. Menguasai Prosedur 10-55 Traffic Stop & 10-38 Felony Stop.\n4. Lolos evaluasi kinerja dari Sergeant."
            ],
            [
                'from_rank' => 'Officer II (PO II)',
                'to_rank' => 'Officer III (PO III / Senior Officer)',
                'category_type' => 'Specialization',
                'requirements_list' => "1. Minimal masa kerja 21 hari di rank PO II.\n2. Memiliki sertifikasi divisi khusus (SWAT / ASD / HSIU / K-9).\n3. Mampu menjadi Lead Officer saat patroli unit ADAM.\n4. Evaluasi dari Lieutenant."
            ],
            [
                'from_rank' => 'Officer III (PO III)',
                'to_rank' => 'Sergeant I (SGT I)',
                'category_type' => 'Leadership Examination',
                'requirements_list' => "1. Minimal masa kerja 30 hari di kepolisian.\n2. Lulus Ujian Kepemimpinan & Incident Command (IC).\n3. Rekomendasi resmi dari Captain / Executive Staff.\n4. Memiliki kemampuan manajemen konflik & pembimbingan Rookie."
            ],
            [
                'from_rank' => 'Sergeant I / II',
                'to_rank' => 'Lieutenant & Command Staff',
                'category_type' => 'Executive Appointment',
                'requirements_list' => "1. Penunjukan langsung dari Chief of Police / High Command.\n2. Rekam jejak kepemimpinan divisonal yang unggul.\n3. Bertanggung jawab atas pengelolaan operasional stasiun patroli."
            ],
        ];

        foreach ($promotions as $p) {
            PromotionQualification::create($p);
        }
    }
}
