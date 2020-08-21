<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'WooCommerceP1' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'RhPZ;sY-Kj=5)WJt)bsO8$m43E>)rXw^_M5{Nl@rugya9-9yhdA4xID_uL&:Z!FM' );
define( 'SECURE_AUTH_KEY',  '08z.sdp?%}I[[hQ`%m<jJ1,t8+v$ls=8~mKz$.74$Q4Hau:~~-_ZmD+l&o~&g}h!' );
define( 'LOGGED_IN_KEY',    '+y4nZ~aCQxk6~}2j~Q@!d?&#)P!::<p1bl:!$32.AS:`v]%{<IN}<7Pcczxg=uPu' );
define( 'NONCE_KEY',        '?6RV;P-IUD(a;Jr`=eRK;pQ8@]KUGM1<ZJq}rNU&&y&GyGa$4n#Vrq=+%-t6QL]%' );
define( 'AUTH_SALT',        '<0LDyibl!mT^Ext[TF@JiL3C1/6];PD]cGiVzmJ)D$1An5=I2CJC|OrCUzs$v`!+' );
define( 'SECURE_AUTH_SALT', '_B)>X]{OIw=Xz vGzo$m-ke{s0z?FfDXC|Ew$Ivj#R.F,gS~OE%uP`}o a^x^aCx' );
define( 'LOGGED_IN_SALT',   '#aS3<hE/h`i3,Af3yp[8heii,[$&t#~qy3]*iWu(e.t@TMLaiRO [KK*0B[^A>gZ' );
define( 'NONCE_SALT',       'q2i;GVd26hC+4_E>,X+%(?(?![[W2{JU2Jz:<j2(3z4>PmB!^hYh2<zqhlL+,P+<' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
