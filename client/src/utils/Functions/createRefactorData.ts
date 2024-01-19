import { DisplayableData, IBoxes, LogDataType } from '../types';

export const createDisplayableData = (data: IBoxes[]) => {
  const displayableData = [];

  for (const item of data) {
    const name = `${item.collector.firstName} ${item.collector.lastName}`;

    displayableData.push({
      id: item.id,
      name: name,
      amount_EUR: item.amount_EUR,
      amount_GBP: item.amount_GBP,
      amount_USD: item.amount_USD,
      amount_PLN: item.amount_PLN,
      comment: item.comment,
      time_counted: item.time_counted,
    });
  }

  return displayableData as DisplayableData[];
};

export const createDisplayableLogData = (data: LogDataType[]) => {
  const displayableLogData = [];

  for (const [index, item] of data.entries()) {
    displayableLogData.push({
      log_id: index,
      name: item.user.name,
      user_id: item.user_id,
      box_id: item.box_id,
      type: item.type,
      comment: item.comment,
      created_at: item.created_at,
    });
  }

  return displayableLogData as DisplayableData[];
};
