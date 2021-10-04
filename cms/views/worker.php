<style media="screen">
  table { border: 1px solid #000; display: table; }
  table thead { background-color: rgba(0,0,0, 0.1); font-weight: 900; }
  table tbody td { border-bottom: 1px solid grey; }
  table tr td { padding: 8px;  }
</style>

<table>
  <thead>
    <td>Subscription ID</td>
    <td>Device Token ID</td>
    <td>Device App ID</td>
    <td>Expire Date</td>
    <td>Status</td>
  </thead>
  <tbody>
    <?php foreach ($subs as $item): ?>
      <tr>
        <td><?php echo $item["subscription_id"]; ?></td>
        <td><?php echo $item["subscription_device_token"]; ?></td>
        <td><?php echo $item["subscription_appid"]; ?></td>
        <td><?php echo $item["subscription_expire_date"]; ?></td>
        <?php if ($item["subscription_status"] == "continues"): ?><td style="background-color: green; color:#fff;">Devam Ediyor</td><?php endif; ?>
        <?php if ($item["subscription_status"] == "expired"): ?><td style="background-color: red; color:#fff;">Süresi Bitti</td><?php endif; ?>

      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
