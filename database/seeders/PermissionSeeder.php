<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'Année scolaire' => [
                'peut créer une année',
                'peut modifier une année',
                'peut supprimer une année',
                'peut voir une année',
            ],

            'Classe' => [
                'peut créer une classe',
                'peut modifier une classe',
                'peut supprimer une classe',
                'peut voir une classe',
            ],

            'Option' => [
                'peut créer une option',
                'peut modifier une option',
                'peut supprimer une option',
                'peut voir une option',
            ],

            'Paiement' => [
                'peut effectuer un paiement',
            ],

            'Utilisateur' => [
                'peut créer un utilisateur',
                'peut modifier un utilisateur',
                'peut supprimer un utilisateur',
                'peut voir un utilisateur',
            ],

            'Étudiant' => [
                'peut créer un étudiant',
                'peut modifier un étudiant',
                'peut supprimer un étudiant',
                'peut voir un étudiant',
            ],

            'Réinscription' => [
                'peut faire une réinscription',
            ],

            'Liste de recouvrement' => [
                'peut voir la liste de recouvrement',
                'peut imprimer la liste de recouvrement',
            ],

            'Frais' => [
                'peut créer un frais',
                'peut modifier un frais',
                'peut supprimer un frais',
                'peut voir un frais',
            ],

            'Palmarès' => [
                'peut voir les palmarès des années',
            ],

            'permission' => [
                'peut assigner permission',
            ],
        ];

        foreach ($permissions as $group => $perms) {
            foreach ($perms as $permission) {
                Permission::firstOrCreate([
                    'name' => $permission,
                    'group_name' => $group,
                ]);
            }
        }
    }
}
