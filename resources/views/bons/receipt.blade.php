<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reçu Bon d'Achat</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background: #fff; }
        .container { width: 350px; margin: auto; padding: 20px; border: 2px solid black; border-radius: 10px; }
        .header img { max-width: 80px; }
        .header h2 { font-size: 18px; text-transform: uppercase; margin-bottom: 5px; }
        .header p { font-size: 14px; color: gray; margin-top: 0; }
        table { width: 100%; font-size: 14px; margin-top: 10px; border-collapse: collapse; }
        th, td { padding: 5px 10px; text-align: left; }
        th { background: #ddd; border-bottom: 1px solid black; }
        .total { font-weight: bold; font-size: 16px; color: red; }
        .status {
            padding: 5px 10px;
            color: white;
            text-align: center;
            display: inline-block;
            border-radius: 5px;
        }
        .bg-success { background: #28a745; }
        .bg-warning { background: #ffc107; color: black; }
        .bg-danger { background: #dc3545; }
        .footer { font-size: 12px; color: gray; margin-top: 10px; }
        hr { border-top: 1px dashed gray; }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <img src="{{ public_path('img/logo.png') }}" alt="Logo">
            <h2>SMART_PUMP</h2>
            <p>Reçu officiel</p>
        </div>

        <hr style="border-top: 2px dashed gray;">

        <table style="width: 100%; font-size: 14px;">
            <tr>
                <td><strong>Code Bon :</strong></td>
                <td class="text-end">{{ $bon->code_bon }}</td>
            </tr>
            <tr>
                <td><strong>Client :</strong></td>
                <td class="text-end">{{ $bon->client->nom }}</td>
            </tr>
            <tr>
                <td><strong>Carburant :</strong></td>
                <td class="text-end">{{ $bon->carburant->nom }}</td>
            </tr>
            <tr>
                <td><strong>Quantité :</strong></td>
                <td class="text-end">{{ number_format($bon->quantite, 2) }} L</td>
            </tr>
            <tr>
                <td><strong>Prix Unitaire :</strong></td>
                <td class="text-end">{{ number_format($bon->carburant->prix_unitaire, 2) }} €/L</td>
            </tr>
        </table>

        <hr style="border-top: 1px solid black;">

        <table style="width: 100%; font-size: 16px; font-weight: bold;">
            <tr>
                <td>Total :</td>
                <td class="text-end text-danger">{{ number_format($bon->montant, 2) }} €</td>
            </tr>
        </table>

        <hr style="border-top: 2px dashed gray;">

        <table style="width: 100%; font-size: 14px;">
            <tr>
                <td><strong>Date d'émission :</strong></td>
                <td class="text-end">{{ $bon->date_emission }}</td>
            </tr>
            <tr>
                <td><strong>Date d'expiration :</strong></td>
                <td class="text-end">{{ $bon->date_expiration }}</td>
            </tr>
            <tr>
                <td><strong>Statut :</strong></td>
                <td class="text-end">
                    <span class="badge {{ $bon->statut == 'valide' ? 'bg-success' : ($bon->statut == 'utilisé' ? 'bg-warning' : 'bg-danger') }}">
                        {{ ucfirst($bon->statut) }}
                    </span>
                </td>
            </tr>
        </table>

        <hr style="border-top: 2px dashed gray;">

        <div class="text-center" style="font-size: 14px;">
            <p>Merci pour votre achat !</p>
            <p>&copy; 2025 Station Service</p>
        </div>

        <hr style="border-top: 1px solid black;">
    </div>

</body>
</html>
